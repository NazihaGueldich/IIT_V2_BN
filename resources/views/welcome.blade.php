<div class="bigbox">
    <div class="nav">
        <div class="navContain">
            <div class="menu"></div>
        </div>
    </div>
    <div class="contentContain">
        <div class="titleBox">
            <h1 class="mainTitle" style="margin-left: -23%;color:#1b195d">
                Bienvenue...
            </h1>
            <br>
            <br>
            <div style="margin-left: -50%;">
                <a href="http://127.0.0.1:8000/login" title="logo" style="padding-left: 150px;">
                    <input type="button" class="button" value="  Administration" >&nbsp;&nbsp;&nbsp
                </a>
                <a href="https://enseignant.iitadmin.tn/login" title="logo">
                    <input type="button" class="button" value="Enseignant">
                </a>
            </div>
        </div>
        <div class="imgBox">
            <div class="fond" style="margin-left: 13%;margin-top:16% ">
                <div class="logo">
                    <a href="https://iit.tn" title="logo" target="_blank" style="padding-left: 20px;">
                        <img width="400" height="380" 
                            src="https://iit.tn/wp-content/uploads/2019/06/logoISB1-1.png" title="logo"
                            alt="logo">
                    </a>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer" style="color: #070313">
        <a href="https://exadev.tn/" title="logo" target="_blank" style="color: #301283">
            <p style="font-size:24px; color:rgba(14, 29, 129, 0.741); margin-top:10%;">&copy; <strong>Exadev.tn</strong>

            </p>

    </footer>
</div>


<style>
    @import url('https://fonts.googleapis.com/css?family=Slabo+27px');



    body {
        margin: 0;
        padding: 0;
        height: 100vh;
        width: 100%;
        font-family: 'Slabo 27px', serif;
        background-color: #aeb3bd
    }

    @keyframes slideUp {
        0% {
            height: 0vh;
        }

        50% {
            height: 100vh;
            bottom: 0;
        }

        100% {
            bottom: 100vh;
        }
    }

    body:before {
        content: '';
        height: 0vh;
        width: 100vw;
        background-color: #1a4db4;
        position: absolute;
        bottom: 0;
        z-index: 100;
        animation-name: slideUp;
        animation-duration: 1s;
    }

    @keyframes slideUp2 {
        0% {
            height: 100vh;
        }

        50% {
            height: 100vh;
            bottom: 0;
        }

        100% {
            bottom: 100vh;
        }
    }

    body:after {
        content: '';
        height: 0vh;
        width: 100vw;
        background-color: rgb(80, 81, 93);
        position: absolute;
        bottom: 0;
        z-index: 90;
        animation-name: slideUp2;
        animation-duration: 1s;
    }

    .bigbox {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        align-items: center;
        z-index: 5;
        overflow: hidden;
    }

    @keyframes slideIn {
        0% {
            right: -800px;
        }

        50% {
            right: -800px;
        }

        100% {
            right: -600px;
        }
    }

    .bigbox:after {
        content: '';
        height: 1200px;
        width: 1200px;
        background-color: #2b3e8f;
        position: absolute;
        z-index: -1;
        border-radius: 1200px;
        right: -600px;
        top: -80px;
        animation-name: slideIn;
        animation-duration: 2s;
    }

    .nav {
        height: 100px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        position: absolute;
    }

    .navContain {
        width: 1200px;
        height: 30%;
        display: flex;
        justify-content: space-between;
    }

    .logo {
        font-weight: 900;
        font-family: sans-serif;
        color: #333;
        font-size: 20px;
        line-height: 30px;
    }

    .menu {
        height: 100%;
        width: 20px;
        background-color: ;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }


    .contentContain {
        width: 1200px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        height: 100%;
    }

    .titleBox {}

    @keyframes shrink {

        0% {
            height: 100vh;
            width: 100vw;
            right: 0;
        }

        55% {
            height: 100vh;
            width: 100vw;
            right: 0;
        }

        100% {
            height: 80vh;
            width: 700px;
            right: calc(calc(100vw - 1200px) / 2);
        }
    }

    .imgBox {
        background: #cdcdef;
        position: absolute;
        opacity: 0.9;
        height: 75vh;
        width: 600px;
        right: calc(calc(100vw - 1200px) / 2);
        animation-name: Grow;
        animation-duration: 2.5s;
        border-radius: 48%;
    }

    .mainTitle {
        font-size: 50px;
        color: #000000
    }



    .button {
        background-image: linear-gradient(92.88deg, #2f489c 9.16%, #2f489c 43.89%, #3055d1 64.72%);
        border-radius: 11px;
        border-style: none;
        box-sizing: border-box;
        color: #FFFFFF;
        cursor: pointer;
        flex-shrink: 0;
        text-transform: uppercase;
        font-size: 16px;
        font-weight: 500;
        height: 4rem;
        padding: 0 1.6rem;
        text-align: center;
        text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
        transition: all .5s;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button:hover {
        box-shadow: rgba(59, 41, 191, 0.5) 0 1px 30px;
        transition-duration: .1s;
    }

    @media (min-width: 768px) {
        .button {
            padding: 0 2.6rem;
        }
    }
</style>
