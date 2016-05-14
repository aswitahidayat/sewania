<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class utama extends CI_Controller {
     
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	$data['jenis']= "Home";
	$data['error'] = "";
	$this->load->view('utama' , $data);
	}
	
	 private $limit = 2;
	 var $terms     = array();
	
	function parents()
	{
		parent::__construct();	
 
		// load model
		$this->load->model('parentmodel','',TRUE);
 
		// load helper
		$this->load->helper('url');
	}
	
	function indexed()
	{		
	$this->load->model('madmin');
		// offset
		$uri_segment = 3;
         
		 $kat = $this->input->post('cmbcari');
		 $cari = $this->input->post('tekscari');
		 
		 $tabel = $this->uri->segment(2);
		 
		// return third URI segment, if no third segment returns '' 
		$offset = $this->uri->segment($uri_segment,'');			
 
		// assign posted valued
		$data['clientname'] = $this->input->post('kat');
		$data['group']      = $this->input->post('cari');		
		$data['remarks']    = $this->input->post('remarks');
 
		// gets total URI segments
		$total_seg          = $this->uri->total_segments();			 
		
		if(isset($_POST['tblcari'])){
		$newdata = array('kat' => $kat , 'cari' => $cari , 'pencarian' => TRUE);
		$this->session->set_userdata($newdata);
		}
		else{
		$newdata = array('kat' => $this->uri->segment(3) , 'cari' => $this->uri->segment(4) , 'pencarian' => TRUE);
		$this->session->set_userdata($newdata);
		}
 
		// set search params
		// enters here only when 'Search' button is pressed or through 'Paging'
		if(isset($_POST['tblcari']) || $total_seg>3){			
 
			$default = array('clientname', 'group', 'remarks');
			
			
 
			if($total_seg > 3){
 			// navigation from paging									
 
				/**
				 *
				 * Convert URI segments into an associative array of key/value pairs
				 * But this array also contains the last redundant key value pair taking the page number as key.
				 * So, the last key value pair must be removed.				 
				 *
				*/
 
				$this->terms = $this->uri->uri_to_assoc(3,$default); 
 
				/**
				 * Replacing all the 'unset' values in the associative array (with keys as in $default array) to null value
				 * and create a new array '$this->terms_uri' taking only the database keys we need to query, 				
				**/
 
				for($i=0;$i<count($default);$i++){										
					if($this->terms[$default[$i]] == 'unset'){
						$this->terms[$default[$i]] = '';						
						$this->terms_uri[$default[$i]] = 'unset';
 
					}else{
						$this->terms_uri[$default[$i]] = $this->terms[$default[$i]];		
					}									
				}				
 
				// When the page is navigated through paging, it enters the condition below
				if(($total_seg % 2) > 0){					 		 
					// exclude the last array item (i.e. the array key for page number), prepare array for database query
					$this->terms = array_slice($this->terms, 0 , (floor($total_seg/2)-1));					
 
					$offset = $this->uri->segment($total_seg, '');		
					$uri_segment = $total_seg;
				}
 
				// Convert associative array $this->terms_uri to segments to append to base_url
				$keys = $this->session->userdata('kat').'/'.$this->session->userdata('cari');		
 
				$data['hasil'] = $this->madmin->get_search_pagedlist($this->limit, $offset)->result();
 
				// set total_rows config data for pagination			
				$config['total_rows'] = $this->madmin->count_all_search();		
 
				$this->terms = array();								// resetting terms array
				$this->terms_uri = array();							// resetting terms_uri array
			}else{
			// navigation through POST search button
 
				$searchparams_uri = array();
 
				for($i=0;$i<count($default);$i++){
					if($this->input->post($default[$i]) != ''){						
						$searchparams_uri[$default[$i]] = $this->input->post($default[$i]);
						$data[$default[$i]] = $this->input->post($default[$i]);						
					}else{										
						$searchparams_uri[$default[$i]] = 'unset';
						$data[$default[$i]] = '';						
					}
				}			
 
				// Replace all the 'unset' values in an associative array to null value and create a new array '$searchparams' for database processing
				foreach($searchparams_uri as $k=>$v){
					if($v != 'unset'){
						$searchparams[$k] = $v;
					}else{
						$searchparams[$k] = '';
					}					
				}					
				
				$data['hasil'] = $this->madmin->get_search_pagedlist($this->limit, $offset)->result();
 
				// turn associative array to segments to append to base_url
				$keys = $kat.'/'.$cari;	
 
				// set total_rows config data for pagination			
				$config['total_rows'] = $this->madmin->count_all_search();
			}
		}else{
			// load data
			$data['hasil'] = $this->madmin->get_paged_list($this->limit, $offset)->result();
 
			// set total_rows config data for pagination
			$config['total_rows'] = $this->madmin->count_all();
			$searchparams = "";
			$keys = "";
		}			
 
		// generate pagination
		
 
		$config['base_url'] = site_url('utama/'.$tabel.'/').'/'.$keys.'/';
  		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['num_links'] = 3;
		$config['next_tag_open'] = '<b>';
		$config['next_tag_close'] = '</b>';
		$config['prev_tag_open'] = '<b>';
		$config['prev_tag_close'] = '</b>';
		$config['next_link'] = '&#187;';
		$config['prev_link'] = '&laquo;';
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
 
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
 
		$heading = array('No','Clientname', 'Group', 'Remarks');				
 
		$this->table->set_heading($heading);
		$i = 0 + $offset;
		
		$data['table'] = $this->table->generate();		
 
		// load view
		$this->load->view('utama', $data);		
	}

function tambah_cart(){
$mod = 'content/details/';
if($this->input->post('submit')){
$id = $this->input->post('txtid');
$sg4 = $this->input->post('txtnama');
$this->load->model('madmin');
$this->madmin->tambah_cart();
redirect($mod.$id.'/'.url_title($sg4).'/'.'produk-pilihan-'.url_title($sg4).'.html');
}
else{
$this->load->view('main');
}
}

	
function admin(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->Home();
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function Logout(){
$this->session->sess_destroy();
redirect("utama");
}

function backup(){
$this->load->dbutil();
$prefs = array('tables' => array() , 'ignore' => array() , 'format' => 'txt' , 'add_drop' => TRUE , 'add_insert' => TRUE ,
               'newline' => "\r\n");
			   
$backup =& $this->dbutil->backup($prefs);

$this->load->helper('file');
write_file('./backup/ivory_backup_'.date('dMY_His').'.sql' , $backup);
$this->load->helper('download');
force_download('ivory_backup_'.date('dMY_His').'.sql' , $backup);
}

function hubungi(){
$this->load->model('m_headline'); 
$data['captcha'] = $this->m_headline->createcaptcha();
$data['msg'] = '';
$data['hasil'] = $this->m_headline->m_shoutcontent();
$this->load->model('m_headline');
$data['daftarisi'] = $this->m_headline->headline(5,0);
$data['daftarheadline'] = $this->m_headline->headlineisi(5,0);
$data['latest'] = $this->m_headline->m_headline_latest(6,0);
$data['about'] = $this->m_headline->m_about(1,0);
$data['menu'] = $this->m_headline->headlinemenu();
$data['offer'] = $this->m_headline->headline_offer();
$captcha = $this->input->post('txtcaptcha');
if($captcha != ""){
$this->load->model('madmin');
$benar = $this->madmin->captchabenar($_POST['txtcaptcha']);
if($benar){
$this->load->model('madmin');
$data['pesanan'] = "<font color=green>Email suskes dikirim !</font>";
$data['hasil'] = $this->madmin->form();
}
else{
$data['pesanan'] = ' Kode Captcha Salah';
}
}
else{
$data['pesanan'] = 'Kode Captcha harus diisi !';
}
$this->load->view('content' , $data);
}

function kontak(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_kontak(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function orders(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_order(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_order(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_order();
redirect('utama/orders');
}
else{
$this->load->view('utama');
}
}

function ubah_order($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_order($id);
redirect('utama/orders');
}
}

function artikel(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_anjink(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_artikel(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_artikel();
redirect('utama/artikel');
}
else{
$this->load->view('utama');
}
}

function ubah_artikel($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_artikel($id);
redirect('utama/artikel');
}
}

function artist(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->artist();
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_artist(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_artist();
redirect('utama/artist');
}
else{
$this->load->view('utama');
}
}


function main(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->main(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_main(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_main();
redirect('utama/main');
}
else{
$this->load->view('utama');
}
}

function ubah_main($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_main($id);
redirect('utama/main');
}
}

function product(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_product(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_product(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_product();
redirect('utama/product');
}
else{
$this->load->view('utama');
}
}

function ubah_product($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_product($id);
redirect('utama/product');
}
}

function store(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->mstore();
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_store(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_store();
redirect('utama/store');
}
else{
$this->load->view('utama');
}
}

function bagian(){
$bgn = "";
 $amb = mysql_query("select * from jenis_produk where untuk = '$_POST[id]'"  );
   while($r = mysql_fetch_array($amb)){
   
   $bgn .= "<option value=$r[0]> $r[1]</option>";
   
   }
   echo $bgn;
}

function ubah_store($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_store($id);
redirect('utama/store');
}
}

function kamar(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->mlihat_kamar(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_kamar(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_kamar();
redirect('utama/kamar');
}
else{
$this->load->view('utama');
}
}

function ubah_kamar($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_kamar($id);
redirect('utama/kamar');
}
}

function category(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_category(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_category(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_category();
redirect('utama/category');
}
else{
$this->load->view('utama');
}
}

function ubah_category($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_category($id);
redirect('utama/category');
}
}

function autor(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_autor();
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_autor(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_autor();
redirect('utama/autor');
}
else{
$this->load->view('utama');
}
}

function ubah_autor($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_autor($id);
redirect('utama/autor');
}
}

function merk(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_merk(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_merk(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_merk();
redirect('utama/merk');
}
else{
$this->load->view('utama');
}
}

function ubah_merk($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_merk($id);
redirect('utama/merk');
}
}

function warna(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_warna(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_warna(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_warna();
redirect('utama/warna');
}
else{
$this->load->view('utama');
}
}

function ubah_warna($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_warna($id);
redirect('utama/warna');
}
}


function jenis_produk(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['hasil'] = $this->madmin->m_jenis_produk(8,0);
$data['error'] = '';
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function tambah_jenis_produk(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah_jenis_produk();
redirect('utama/jenis_produk');
}
else{
$this->load->view('utama');
}
}

function ubah_jenis_produk($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubah_jenis_produk($id);
redirect('utama/jenis_produk');
}
}

function dropdown(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['error'] = '';
$data['hasil'] = $this->madmin->m_dropdown(8,0);
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function about(){
$this->session->unset_userdata('kat');
$this->session->unset_userdata('cari');
$total_seg          = $this->uri->total_segments();	
$cari = $this->input->post('tekscari');
$kat = $this->input->post('cmbcari');
$this->load->model('madmin');
$data['error'] = '';
$data['hasil'] = $this->madmin->m_about();
if($data['hasil'] == null){
$data['error'] = 'data kosong atau tidak ditemukan!';
$this->load->view('utama' , $data);
}
else if($kat == 'Tampil Semua'){
$this->load->view('utama' , $data);
}
else if($kat != '' || $total_seg == 4 || $total_seg == 5){
$this->indexed();
}
else{
$this->load->view('utama' , $data);
}
}

function error(){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->ambil();
$data['error'] = '[ Gagal upload !! hanya boleh file format gif , png , jpg dan jpeg ]';
$this->load->view('utama' , $data);
}

function Homes(){
	$this->load->model('madmin');
	$query = $this->madmin->m_homes();
	$data['module'] = "Home";
	$data['error'] = "";
	$hasil = array('query' => $query->result());
	$this->load->view("utama" , $hasil);
	}
		
function tambahdata(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambah();
redirect('utama/admin');
}
else{
$this->load->view('utama');
}
}

function tambahdropdown(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambahdropdown();
redirect('utama/dropdown');
}
else{
$this->load->view('utama');
}
}

function tambahabout(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambahabout();
redirect('utama/about');
}
else{
$this->load->view('utama');
}
}

function tambahkontak(){
if($this->input->post('submit')){
$this->load->model('madmin');
$this->madmin->tambahkontak();
redirect('utama/kontak');
}
else{
$this->load->view('utama');
}
}

function ubahkontak($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->ubahkontak($id);
redirect('utama/kontak');
}
}

function ubahabout($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->updateabout($id);
redirect('utama/about');
}
}

function ubahdropdown($id){
if($_POST == NULL){
$this->load->model('Madmin');
$data['hasil'] = $this->Madmin->selectmodul($id);
$data['kosong'] = 'Data masih kosong';
$this->load->view('Utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->updatedropdown($id);
redirect('utama/dropdown');
}
}

function delete($id){
$this->load->Model('madmin');
$this->Madmin->delete($id);
redirect('utama/index');
}

function deletemodul($id){
$modul =  $this->uri->segment(4);
$this->load->Model('madmin');
$this->madmin->deletemodul($id);
redirect("utama/".$modul);
}

function deletemodulall(){
$modul =  $this->uri->segment(3);
$this->load->Model('madmin');
$this->madmin->dellallmodul();
redirect("utama/".$modul);
}


function updates($id){
if($_POST == NULL){
$this->load->model('madmin');
$data['hasil'] = $this->madmin->select($id);
$this->load->view('utama' , $data);
}
else{
$this->load->model('madmin');
$this->madmin->update($id);
redirect('utama/Homes');
}
}
}


/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */