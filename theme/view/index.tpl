<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ tds }}/csses/normalize.css" screen="media">
    <link rel="stylesheet" href="{{ tds }}/csses/styles.css" screen="media">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
    <section id="n_headline">
        <div class="container">
            <div class="logotype">
                <a href="/">iMage 2.0.0</a>
            </div>
            <div class="links">
                <ul>
                    <!--<li><a href="#">Авторизация</a></li>-->
                    <li><a href="https://github.com/tomasci/iMage/" target="_blank">GitHub</a></li>
                </ul>
            </div>
        </div>
    </section>

    <section id="n_upload">
        <div class="container">
            <form class="form">
                <div class="upload" data-text="Выберите файл!">
                    <input type="file" name="file" class="field">
                </div>

                <input type="submit" value="Загрузить">
            </form>
        </div>
    </section>

    <section id="n_result">
        <div class="container">
            <input type="text" value="" id="result" onClick="this.setSelectionRange(0, this.value.length)">
            <div class="link">
                <a id="return">Загрузить еще</a>
            </div>
        </div>
    </section>
</body>
<script src="{{ tds }}/core/core.js"></script>
</html>