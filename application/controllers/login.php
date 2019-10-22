<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function login_()
	{
		$query = $this->db->query("select * from `user` 
		where `username` = '$_POST[username]' and `password` = '$_POST[password]'");		
		$jlh = $query->num_rows();
		if($jlh > 0){
			foreach ($query->result() as $row)
			{		
				$arrdata = array(
					'id_user'=>$row->id_user,
					'level'=>$row->level,
					'username'=>$row->username);	
			    $this->session->set_userdata($arrdata);
			    
			    ?>
				<script>
					window.location="<?php echo base_url("index.php/".$row->level."/home");?>";
				</script>
				<?php
			}
		}else{
			?>
				<script>
					alert("Maaf, Username dan Password Salah");
					window.location="<?php echo base_url('index.php');?>";
				</script>
			<?php
		}
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		?>
			<script>
				window.location="<?php echo base_url('index.php');?>";
			</script>
		<?php
	}
	
}
