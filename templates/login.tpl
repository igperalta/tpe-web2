{include file="header.tpl"}
<p class="servicestitle">INICIAR SESIÓN</p>
<div>
    <section>
        <form class="formLogReg" action="verifyLogin" method="POST">

            <span class="spanReserva">E-MAIL</span>
            <input type="text" name="input-email" placeholder="E-MAIL" id="email">
            <span class="spanReserva">PASSWORD</span>
            <input type="password" name="input-pass" placeholder="PASSWORD" id="pass">

            <div class="confirmaForm">
                <span class="spanReserva">Para ingresar clickee el logo</span>
                <div class="divconfirmaCaptcha">

                    <button type="submit" class="confirmarButton">
                        <img src="./css/images/botoncaptcha.png" alt=""></button>
                </div>
            </div>

            <div class="mensajeLogin">
                <span>{$message}</span>
            </div>
        </form>
    </section>
</div>
        <img class="studiodrums" src="./css/images/studiodrums.png" alt="Bateria
                    de Estudio">
        {include file="footer.tpl"}