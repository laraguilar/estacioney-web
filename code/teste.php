<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                function escreverArquivo() {  

                    var fso  = new ActiveXObject("Scripting.FileSystemObject");

                    var fh = fso.CreateTextFile("C:TesteEstac.txt", true); 

                    fh.WriteLine(idClicadoJson);

                    fh.Close();}

                // funcao que percebe o evento de clique no item do dropdown
                $(".liberar").click(function() {
                    var idClicado = $(this).attr('id'); // pega o ID da vaga selecionada

                    // tranforma o id em um objetojava
                    var objId = new Object();
                    objId.id = idClicado;

                    // transforma o objeto em json
                    let idClicadoJson = JSON.stringify(objId);
                });
            });
        </script>   