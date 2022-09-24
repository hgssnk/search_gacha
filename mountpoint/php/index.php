<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>ニュースガチャ</title>
    <meta name="description" content="index">
    <meta name="author" content="index">
    <link rel="stylesheet" href="style.css">
<body>

<?php
$citys_result = [];
$country_result = [];
$knowledge_result = [];
$all_result = [];

// csv to array
$f = fopen("./csv/citys.csv", "r");
while($line = fgetcsv($f)) {
  for ($i=0;$i<count($line);$i++) {
    $citys_result[] = $line[$i];
  }
}
fclose($f);
$f = fopen("./csv/country.csv", "r");
while($line = fgetcsv($f)) {
  for ($i=0;$i<count($line);$i++) {
    $country_result[] = $line[$i];
  }
}
fclose($f);
$f = fopen("./csv/knowledge_category.csv", "r");
while($line = fgetcsv($f)) {
  for ($i=0;$i<count($line);$i++) {
    $knowledge_result[] = $line[$i];
  }
}
fclose($f);
$f = fopen("./csv/all.csv", "r");
while($line = fgetcsv($f)) {
  for ($i=0;$i<count($line);$i++) {
    $all_result[] = $line[$i];
  }
}
fclose($f);

// array to json
$citys_keywords_json = json_encode($citys_result);
$country_keywords_json = json_encode($country_result);
$knowledge_keywords_json = json_encode($knowledge_result);
$all_keywords_json = json_encode($all_result);
?>

    <MARQUEE DIRECTION="right" SCROLLDELAY="60"><IMG src="./mario.gif" width="60" height="60" border="0"></MARQUEE>
    <div class="container">
    <h2 style="font-size: 50px;">ようこそ、未知の世界へ</h2>
        <hr>
        <h2>国名 ガチャ</h2>
        <a class="btn btn--red btn--border-inset" onclick="google_news_country()">Google</a>
        <a class="btn btn--red btn--border-inset" onclick="yahoo_news_country()">Yahoo</a>
        <a class="btn btn--red btn--border-inset" onclick="sankei_news_country()">産経</a>
        <a class="btn btn--red btn--border-inset" onclick="nikkei_news_country()">日経</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_country()">TBS</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_country()">NHK</a>
        <hr>
        <h2>市区町村 ガチャ</h2>
        <a class="btn btn--red btn--border-inset" onclick="google_news_citys()">Google</a>
        <a class="btn btn--red btn--border-inset" onclick="yahoo_news_citys()">Yahoo</a>
        <a class="btn btn--red btn--border-inset" onclick="sankei_news_citys()">産経</a>
        <a class="btn btn--red btn--border-inset" onclick="nikkei_news_citys()">日経</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_citys()">TBS</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_citys()">NHK</a>
        <hr>
        <h2>学問 ガチャ</h2>
        <a class="btn btn--red btn--border-inset" onclick="google_news_knowledge()">Google</a>
        <a class="btn btn--red btn--border-inset" onclick="yahoo_news_knowledge()">Yahoo</a>
        <a class="btn btn--red btn--border-inset" onclick="sankei_news_knowledge()">産経</a>
        <a class="btn btn--red btn--border-inset" onclick="nikkei_news_knowledge()">日経</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_knowledge()">TBS</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_knowledge()">NHK</a>
        <hr>
        <h2>国名 + 市区町村 + 学問 ガチャ</h2>
        <p style="font-size: 20px;"> （キーワードの比率的に、市区町村が出がち問題）</p>
        <a class="btn btn--red btn--border-inset" onclick="google_news_all()">Google</a>
        <a class="btn btn--red btn--border-inset" onclick="yahoo_news_all()">Yahoo</a>
        <a class="btn btn--red btn--border-inset" onclick="sankei_news_all()">産経</a>
        <a class="btn btn--red btn--border-inset" onclick="nikkei_news_all()">日経</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_all()">TBS</a>
        <a class="btn btn--red btn--border-inset" onclick="tbs_news_all()">NHK</a>
        <hr>
    </div>

<script>
// get jsons
var citysKeywords = JSON.parse('<?php echo $citys_keywords_json; ?>');
var countryKeywords = JSON.parse('<?php echo $country_keywords_json; ?>');
var knowledgeKeywords = JSON.parse('<?php echo $knowledge_keywords_json; ?>');
var allKeywords = JSON.parse('<?php echo $all_keywords_json; ?>');
var CitysKeywordsLength = citysKeywords.length;
var CountryKeywordsLength = countryKeywords.length;
var KnowledgeKeywordsLength = countryKeywords.length;
var AllKeywordsLength = allKeywords.length;

// citys news
function google_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://news.google.com/search?q=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function yahoo_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://news.yahoo.co.jp/search?p=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function sankei_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://www.sankei.com/search/?kw=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nikkei_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://www.nikkei.com/search?keyword=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function tbs_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://newsdig.tbs.co.jp/list/search?fulltext=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nhk_news_citys() {
    var random_int = Math.floor( Math.random() * CitysKeywordsLength );
    var random_keyword = "https://www.nhk.jp/search/?q=" + citysKeywords[random_int];
    window.open(random_keyword, '_blank');
}

// county news
function google_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://news.google.com/search?q=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function yahoo_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://news.yahoo.co.jp/search?p=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function sankei_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://www.sankei.com/search/?kw=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nikkei_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://www.nikkei.com/search?keyword=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function tbs_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://newsdig.tbs.co.jp/list/search?fulltext=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nhk_news_country() {
    var random_int = Math.floor( Math.random() * CountryKeywordsLength );
    var random_keyword = "https://www.nhk.jp/search/?q=" + countryKeywords[random_int];
    window.open(random_keyword, '_blank');
}

// knowledge news
function google_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://news.google.com/search?q=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function yahoo_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://news.yahoo.co.jp/search?p=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function sankei_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://www.sankei.com/search/?kw=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nikkei_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://www.nikkei.com/search?keyword=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function tbs_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://newsdig.tbs.co.jp/list/search?fulltext=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nhk_news_knowledge() {
    var random_int = Math.floor( Math.random() * KnowledgeKeywordsLength );
    var random_keyword = "https://www.nhk.jp/search/?q=" + knowledgeKeywords[random_int];
    window.open(random_keyword, '_blank');
}

// all news
function google_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://news.google.com/search?q=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function yahoo_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://news.yahoo.co.jp/search?p=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function sankei_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://www.sankei.com/search/?kw=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nikkei_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://www.nikkei.com/search?keyword=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function tbs_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://newsdig.tbs.co.jp/list/search?fulltext=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
function nhk_news_all() {
    var random_int = Math.floor( Math.random() * AllKeywordsLength );
    var random_keyword = "https://www.nhk.jp/search/?q=" + allKeywords[random_int];
    window.open(random_keyword, '_blank');
}
</script>

</body>

</html>
