
<style>
    /* @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap"); */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        /* background-color: #029B8C; */
    }

    .wrapper {
        position: fixed;
        bottom: 50px;
        left: -350px;
        max-width: 340px;
        width: 100%;
        background: #fff;
        border-radius: 8px;
        padding: 15px 25px 22px;
        transition: right 0.3s ease;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        z-index: 99;
    }

    .wrapper.show {
        left: 20px;
    }

    .wrapper header {
        display: flex;
        align-items: center;
        column-gap: 15px;
    }

    header i {
        color: #061d49;
        font-size: 32px;
    }

    header h2 {
        color: #061d49;
        font-weight: 500;
    }

    .wrapper .data {
        margin-top: 16px;
    }

    .wrapper .data p {
        color: #333;
        font-size: 16px;
    }

    .data p a {
        color: #061d49;
        text-decoration: none;
    }

    .data p a:hover {
        text-decoration: underline;
    }

    .wrapper .buttons {
        margin-top: 16px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .buttons .button {
        border: none;
        color: #fff;
        padding: 8px 0;
        border-radius: 4px;
        background: #061d49;
        cursor: pointer;
        width: calc(100% / 2 - 10px);
        transition: all 0.2s ease;
    }

    .buttons #acceptBtn:hover {
        background-color: #061d49;
    }

    #declineBtn {
        border: 2px solid #061d49;
        background-color: #fff;
        color: #061d49;
    }

    #declineBtn:hover {
        background-color: #061d49;
        color: #fff;
    }
</style>

<div class="wrapper">
    <header>
        <i class="fa fa-cookie-bite"></i>
        <h2>Cookies Consent</h2>
    </header>

    <div class="data">
        <p>This website uses cookies to provide you with a more personalised and relevant browsing experience. <a
                href="#"> Read More...</a></p>
    </div>

    <div class="buttons">
        <button class="button" id="acceptBtn">Accept</button>
        <button class="button" id="declineBtn">Decline</button>
    </div>
</div>


<script>
    const cookieBox = document.querySelector(".wrapper"),
        buttons = document.querySelectorAll(".button");

    const executeCodes = () => {
        //if cookie contains codinglab it will be returned and below of this code will not run
        if (document.cookie.includes("codinglab")) return;
        cookieBox.classList.add("show");

        buttons.forEach((button) => {
            button.addEventListener("click", () => {
                cookieBox.classList.remove("show");

                //if button has acceptBtn id
                if (button.id == "acceptBtn") {
                    //set cookies for 1 month. 60 = 1 min, 60 = 1 hours, 24 = 1 day, 30 = 30 days
                    document.cookie = "cookieBy= codinglab; max-age=" + 60 * 60 * 24 * 30;
                }
            });
        });
    };

    //executeCodes function will be called on webpage load
    window.addEventListener("load", executeCodes);
</script>
