<!DOCTYPE html>
<html lang="en-gb" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact layout example - UIkit documentation</title>
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" href="images/apple-touch-icon.png">
        <link rel="stylesheet" href="css/uikit.gradient.min.css">
        <link rel="stylesheet" href="css/components/upload.gradient.min.css" />
        <link rel="stylesheet" href="css/components/placeholder.gradient.min.css" />
        <link rel="stylesheet" href="css/components/form-file.gradient.min.css" />
        <link rel="stylesheet" href="css/components/progress.gradient.min.css" />        
        <script src="js/jquery.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/uikit.min.js"></script>
        <script src="js/components/upload.min.js"></script>
        <script src="js/aula2.js"></script>
    </head>

    <body>

        <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

            <div class="uk-grid" data-uk-grid-margin>

                <div class="uk-width-medium-2-3">

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

                <div class="uk-width-medium-1-3 uk-hidden">
                    <div class="uk-panel uk-panel-box uk-panel-box-secondary">
                        <h3 class="uk-panel-title">Contact Details</h3>
                        <p>
                            <strong>Company Name</strong>
                            <br>Street, Country
                            <br>Postal Zip Code
                        </p>
                        <p>
                            <a>youremail@yourdomain.com</a>
                            <br><a>@YourTwitterAccount</a><br>
                            P+44 (0) 208 0000 000
                        </p>
                        <h3 class="uk-h4">Follow Us</h3>
                        <p>
                            <a href="#" class="uk-icon-button uk-icon-github"></a>
                            <a href="#" class="uk-icon-button uk-icon-twitter"></a>
                            <a href="#" class="uk-icon-button uk-icon-dribbble"></a>
                            <a href="#" class="uk-icon-button uk-icon-html5"></a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>