

<!-- container -->
<div class="">

    <ol class="breadcrumb">
        <li><a href="index.php">Home</a></li>
    </ol>

    <div class="row center-block">

        <br><br><br><br><br><br>
        <?php if(Yii::$app->user->identity->admin): ?>
            <div class="row">
                <div class="col-md-4 col-sm-6 highlight ">
                    <a href="#" class="btn btn-success center-block"> REGISTRAR USUÁRIOS</a>
                    <br>
                    <article style="background-color: rgba(92,184,92, 0.5)">
                        <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss fkjdfds fjdnfdjf  jfdnfdnfn  fjsdk</p>
                    </article>

                </div>
                <div class="col-md-4 col-sm-6 highlight">
                    <a href="#" class="btn btn-success center-block"> CONSULTAR USUÁRIOS CADASTRADOS</a>
                    <br>
                    <article style="background-color: rgba(92,184,92, 0.5)">
                        <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss</p>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 highlight">
                    <a href="#" class="btn btn-success center-block"> GERAR RODA DO DIA</a>
                    <br>
                    <article style="background-color: rgba(92,184,92, 0.5)">
                        <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss</p>
                    </article>
                </div>

            </div> <!-- /row  -->
        <?php else: ?>
        <div class="row">
            <div class="col-md-4 col-sm-6 highlight ">
                <a href="#" class="btn btn-success center-block"> ALTERAR MEU CADASTRO</a>
                <br>
                <article style="background-color: rgba(92,184,92, 0.5)">
                    <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss fkjdfds fjdnfdjf  jfdnfdnfn  fjsdk</p>
                </article>

            </div>
            <div class="col-md-4 col-sm-6 highlight">
                <a href="#" class="btn btn-success center-block"> CONSULTAR USUÁRIOS CADASTRADOS</a>
                <br>
                <article style="background-color: rgba(92,184,92, 0.5)">
                    <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss</p>
                </article>
            </div>
            <div class="col-md-4 col-sm-6 highlight">
                <a href="#" class="btn btn-success center-block"> VISUALIZAR RODA DO DIA</a>
                <br>
                <article style="background-color: rgba(92,184,92, 0.5)">
                    <p>bla text test bla bla bal nsadshakldakndsadn sdnsjfsfss</p>
                </article>
            </div>

        </div> <!-- /row  -->
        <?php endif; ?>
    </div>

        </article>
        <!-- /Article -->

    </div>
</div>	<!-- /container -->
</body>
</html>