<?php

// ini_set('display_errors',1);
// error_reporting(E_ALL);

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

// $up = get_meta_tags('http://www.upinside.com.br');
// print_r($up);

require_once('conexao.php');

switch($_POST['acao']){
	case 'cadastro':
		//print_r($_POST);
		//print_r($_FILES);
		$titulo 	= mysql_real_escape_string($_POST['titulo']);
		$descricao 	= mysql_real_escape_string($_POST['descricao']);
		$arquivo	= $_FILES['arquivo'];
		
		if(!$titulo || !$descricao){
			echo 'Titulo e descrição devem ser informados!';
		}else{
			$pasta = '../uploads/';
			if(!file_exists($pasta)) mkdir($pasta,0755);
			
			if($arquivo['tmp_name']){
				$extensao = strchr($arquivo['name'],'.');
				$filename = md5(time()).$extensao;
				
				$imagem = array('.jpg','.jpeg','.png','.gif');
				$video  = array('.mp4','.wmv','.avi');
				
				if(in_array($extensao,$imagem)):
					$subpasta 	= $pasta.'images/';
					$tipo	= 'image';
				elseif(in_array($extensao,$video)):
					$subpasta 	= $pasta.'videos/';
					$tipo	= 'video';
				else:
					$subpasta 	= $pasta.'arquivos/';
					$tipo	= 'arquivo';
				endif;
				if(!file_exists($subpasta)) mkdir($subpasta,0755);
				if(move_uploaded_file($arquivo['tmp_name'],$subpasta.$filename)){
					$imagem = $tipo.'s/'.$filename;
					$data = date('Y-m-d H:i:s');				
					$qr  = "INSERT INTO mod7_imagens (imagem, titulo, descricao, tipo, cadastro) ";
					$qr .= "VALUES ('$imagem', '$titulo', '$descricao', '$tipo', '$data')";
					$ex  = mysql_query($qr) or die(mysql_error());				
					echo '1';
				}else{
					echo 'Erro ao enviar arquivo!';
				}			
			}else{
				echo 'Favor envie um arquivo!';	
			}
		}		
	break;
	
	case 'ler':
		$tipo = mysql_real_escape_string($_POST['tipo']);
		$tipo = ($tipo == 'arquivos' ? 'arquivo' : 
				($tipo == 'imagens' ? 'image' :
				($tipo == 'videos' ? 'video' : '')));
		
		if($tipo): $where = "WHERE tipo = '$tipo'"; endif;
		
		$qr = "SELECT * FROM mod7_imagens {$where} ORDER BY cadastro DESC";
		$ex = mysql_query($qr) or die (mysql_error());
		
		while($res = mysql_fetch_assoc($ex)):
			$conta++;
			$imagem = ($res['tipo'] == 'image' ? 'tim.php?src=uploads/'.$res['imagem'].'&w=273&h=120&a=t' : 
					  ($res['tipo'] == 'arquivo' ? 'img/filethumb.jpg' : 'img/videothumb.jpg'));

			echo '<li class="file j_'.$res['id'] .'">';
          echo '<div class="li-box">';
            echo '<img src="'.$imagem.'" alt="Baixar arquivo" title="Baixar Arquivo" width="273" height="120" />';
              echo '<h2>'.$res['titulo'].'</h2>';
              echo '<p class="desc">'.$res['descricao'].'</p>';
              echo '<p class="data">Enviado em: '.date('d/m/Y',strtotime($res['cadastro'])).' às '.date('H:i',strtotime($res['cadastro'])).'h</a>';
							echo '<p><a class="uk-button" href="uploads/'.$res['imagem'].'"';
								if($res['tipo'] == 'image') echo 'rel="shadowbox"';
								if($res['tipo'] == 'video') echo 'rel="shadowbox;width=853;height=480"';
							echo '>Veja isto!</a></p>';
              echo '<div class="manage">';
                echo '<a class="actionedit" href="'.$res['id'].'"><img src="img/edit.png" alt="" title="" /></a>';
                echo '<a class="actiondelete" href="'.$res['id'].'"><img src="img/delete.png" alt="" title="" /></a>';
              echo '</div>';
            echo '</div>';
        echo '</li>';

		endwhile;
		
	break;
	
	case 'deletar':
		$delid = $_POST['delid'];
		$qr = "SELECT * FROM mod7_imagens WHERE id = '$delid'";
		$ex = mysql_query($qr) or die (mysql_error());
		$st = mysql_fetch_assoc($ex);
		
		$basepatch = '../uploads/';
		if(file_exists($basepatch.$st['imagem']) && !is_dir($basepatch.$st['imagem'])):
			unlink($basepatch.$st['imagem']);
		endif;
		
		$qr = "DELETE FROM mod7_imagens WHERE id = '$delid'";
		$ex = mysql_query($qr) or die (mysql_error());		
	break;
		
	default:
		echo 'Arquivo muito grande ou não compativel!';	
}