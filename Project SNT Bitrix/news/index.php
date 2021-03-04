<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости СНТ");
?>
<section class="news-image images">
    <div class="news-image__title">
        <div class="news-image__title-headers">
            <h1>новости</h1>
        </div>
    </div>
</section>
<section class="news">
    <div class="news__wrapper">
        <div class="news__block"><a class="news__article article" href="/new/"><img class="article__image" src= "../local/templates/snt/images/news/news.jpg" alt="">
                <div class="article__text">
                    <h5>заголовок новости</h5>
                    <p>Товарищи! новая модель организационной деятельности требуют от нас анализа новых предложений. Повседневная практика показывает, что консультация с широким активом влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий.</p>
                </div></a><a class="news__article article" href="/new/"><img class="article__image" src="../local/templates/snt/images/news/news.jpg" alt="">
                <div class="article__text">
                    <h5>заголовок новости</h5>
                    <p> Повседневная практика показывает, что консультация с широким активом влечет за собой процесс внедрения и модернизации существенных финансовых и административных условий.</p>
                </div></a>
        </div>
        <div class="news__nav">
            <a href="/new/" class="news__nav-header">
                <h6>заголовок новости</h6><span class="news__nav-keys">когда добавили/ключевое слово</span>
                <hr>
            </a>
            <a href="/new/" class="news__nav-header">
                <h6>заголовок новости</h6><span class="news__nav-keys">когда добавили/ключевое слово</span>
                <hr>
            </a>
        </div>
    </div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
