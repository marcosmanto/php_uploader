<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estudo de caso 1: Leitor em abas</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script src="js/uikit.min.js"></script>
<script src="js/components/upload.min.js"></script>
<script type="text/javascript" src="js/shadowbox/shadowbox.js"></script>
<script type="text/javascript" src="js/controller.js"></script>
<link rel="stylesheet" href="css/uikit.gradient.min.css">
<link rel="stylesheet" href="css/components/upload.gradient.min.css" />
<link rel="stylesheet" href="css/components/placeholder.gradient.min.css" />
<link rel="stylesheet" href="css/components/form-file.gradient.min.css" />
<link rel="stylesheet" href="css/components/progress.gradient.min.css" />
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<link rel="stylesheet" type="text/css" href="js/shadowbox/shadowbox.css">


</head>

<body class="readerbody">


<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom container-shadow">

  <div class="uk-grid" data-uk-grid-margin="">
      <div class="uk-width-1-1 uk-text-center">
        <img class="logo" src="img/logohub.png" alt="Sistema de arquivos" title="Sistema de arquivos" />
      </div>
  </div>

  <nav class="uk-navbar uk-margin-bottom-remove">

      <ul class="menu uk-navbar-nav uk-hidden-small ">
          <li>
              <a href="#cadastro">Cadastrar mais</a>
          </li>
          <li class="uk-active">
              <a href="#tudo">Ver tudo</a>
          </li>
          <li>
              <a href="#arquivos">Ver arquivos</a>
          </li>
          <li>
              <a href="#imagens">Ver imagens</a>
          </li>
          <li>
              <a href="#videos">Ver vídeos</a>
          </li>
      </ul>
      <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
  </nav>

  <div class="uk-grid" data-uk-grid-margin>
      <div class="uk-width-medium-1-1 uk-text-center">
        <div class="galeria uk-margin-bottom">
          <div class="loading"><img src="img/load.gif" alt="Carregando..." title="Carregando..." />&nbsp;&nbsp;Aguarde, carregando informações!</div>
          <ul class="uk-grid uk-grid-width-1-2 uk-grid-width-large-1-3 lista" data-uk-grid-margin>

            <!--
            <li>
              <div class="li-box">
                <img src="img/filethumb.jpg" alt="Baixar arquivo" title="Baixar Arquivo" width="273" height="120" />
                  <h2>Meu arquivo está aqui</h2>
                  <p class="desc">descrição do meu arquivo pode ser vista aqui, para melhorar o entendimento!</p>
                  <p class="data">Enviado em: 22/03/2013 às 14:30h</p>
                  <a class="uk-button uk-button-large uk-margin-bottom" href="#">Baixar arquivo!</a>
                  <div class="manage">
                    <a class="actionedit" href="editar"><img src="img/edit.png" alt="" title="" /></a>
                      <a class="actiondelete" href="deletar"><img src="img/delete.png" alt="" title="" /></a>
                  </div>
                </div>
            </li>
            -->

          </ul>
        </div>
      </div>
  </div>  
</div>

<div id="offcanvas" class="uk-offcanvas">
  <div class="uk-offcanvas-bar">
    <ul class="uk-nav uk-nav-offcanvas">
      <li>
          <a href="layouts_frontpage.html">Frontpage</a>
      </li>
         <li>
          <a href="layouts_portfolio.html">Portfolio</a>
      </li>
      <li>
          <a href="layouts_blog.html">Blog</a>
      </li>
         <li>
          <a href="layouts_documentation.html">Documentation</a>
      </li>
      <li class="uk-active">
          <a href="layouts_contact.html">Contact</a>
      </li>
      <li>
          <a href="layouts_login.html">Login</a>
      </li>
      </ul>
    </div>
</div>

    
    <div class="modal">

        <div class="uk-width-1-1">

            <div id="debug" class="uk-alert uk-hidden" data-uk-alert="">
                <!-- <a href="" class="uk-alert-close uk-close"></a> -->
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>

            <div id="progressbar" class="uk-progress uk-hidden">
                <div class="uk-progress-bar" style="width: 0%;"></div>
            </div>
            <div class="uk-panel uk-panel-header">

                <h3 class="uk-panel-title">Envio de arquivo</h3>

                <form name="uploader" method="post" class="uk-form uk-form-stacked">
                    <div class="uk-form-row">
                        <div class="uk-form-file">
                            <button class="uk-button">Select</button>
                            <input name="arquivo" id="upload-select1" type="file">
                        </div>
                        <span class="filename"></span>                           
                    </div>
                    
                    <!--
                    <div class="uk-form-row uk-hidden">
                        <div id="upload-drop" class="uk-placeholder uk-text-center">
                            <i class="uk-icon-cloud-upload uk-icon-medium uk-text-muted uk-margin-small-right"></i> Arraste os arquivos aqui ou <a class="uk-form-file">clique aqui<input id="upload-select" type="file" multiple></a> para selecionar.
                        </div>                                  
                    </div>
                    -->

                    <div class="uk-form-row">
                        <label class="uk-form-label">Título</label>
                        <div class="uk-form-controls">
                            <input type="text" name="titulo" placeholder="Informe o título" class="uk-width-1-1">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label">Descrição</label>
                        <div class="uk-form-controls">
                            <textarea name="descricao" placeholder="Adicione uma descrição ao arquivo" class="uk-width-1-1" cols="100" rows="9"></textarea>
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <div class="uk-form-controls">
                            <button class="uk-button uk-button-primary">Submit</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
       <a href="#" class="closemodal">X FECHAR</a>
    </div>


</body>
</html>