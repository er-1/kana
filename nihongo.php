<?php
$timestart = microtime(true);

//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('log_errors', 'On');

define("HIRAGANA", 0);
define("KATAKANA", 1);
define("HIRAGANAYOON", 2);
define("KATAKANAYOON", 3);
define("WIDTH",  350);
define("HEIGHT", 530);
define("BUTTON_PLAY", floor(WIDTH / 5) - 4);
define("HCARD", HEIGHT - (BUTTON_PLAY + 20 + 80));

if (stripos($_SERVER['HTTP_USER_AGENT'], "google") !== false) {
?>
    <html>
    <head>
	<meta name="robots" content="noindex,nofollow">
	<meta name="googlebot" content="noindex,nofollow,noarchive,nosnippet">
	<title>EMPTY</title>
    </head>
    <body>EMPTY</body>
    </html>
<?php
    exit(0);
}
?>
    <!DOCTYPE html>
    <html>
    <head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>NIHONGO</title>
	<script src="jquery.js"></script>
	<script>
var data = [
    [ <?php print(HIRAGANA); ?>, "H", "hiragana", [["a", "あ"], ["i", "い"], ["u", "う"], ["e", "え"], ["o", "お"], ["ka", "か"], ["ki", "き"], ["ku", "く"], ["ke", "け"], ["ko", "こ"], ["sa", "さ"], ["shi", "し"], ["su", "す"], ["se", "せ"], ["so", "そ"], ["ta", "た"], ["chi", "ち"], ["tsu", "つ"], ["te", "て"], ["to", "と"], ["na", "な"], ["ni", "に"], ["nu", "ぬ"], ["ne", "ね"], ["no", "の"], ["ha", "は"], ["hi", "ひ"], ["fu", "ふ"], ["he", "へ"], ["ho", "ほ"], ["ma", "ま"], ["mi", "み"], ["mu", "む"], ["me", "め"], ["mo", "も"], ["ya", "や"], ["yu", "ゆ"], ["yo", "よ"], ["ra", "ら"], ["ri", "り"], ["ru", "る"], ["re", "れ"], ["ro", "ろ"], ["wa", "わ"], ["n", "ん"], ["wo", "を"],
                    ["ga", "が"], ["gi", "ぎ"], ["gu", "ぐ"], ["ge", "げ"], ["go", "ご"], ["za", "ざ"], ["dzi", "じ"], ["zu", "ず"], ["ze", "ぜ"], ["zo", "ぞ"], ["da", "だ"], ["dji", "ぢ"], ["dzu", "づ"], ["de", "で"], ["do", "ど"], ["ba", "ば"], ["bi", "び"], ["bu", "ぶ"], ["be", "べ"], ["bo", "ぼ"], ["pa", "ぱ"], ["pi", "ぴ"], ["pu", "ぷ"], ["pe", "ぺ"], ["po", "ぽ"]]],
    [ <?php print(KATAKANA); ?>, "K", "katakana", [["a", "ア"], ["i", "イ"], ["u", "ウ"], ["e", "エ"], ["o", "オ"], ["ka", "カ"], ["ki", "キ"], ["ku", "ク"], ["ke", "ケ"], ["ko", "コ"], ["sa", "サ"], ["shi", "シ"], ["su", "ス"], ["se", "セ"], ["so", "ソ"], ["ta", "タ"], ["chi", "チ"], ["tsu", "ツ"], ["te", "テ"], ["to", "ト"], ["na", "ナ"], ["ni", "ニ"], ["nu", "ヌ"], ["ne", "ネ"], ["no", "ノ"], ["ha", "ハ"], ["hi", "ヒ"], ["fu", "フ"], ["he", "ヘ"], ["ho", "ホ"], ["ma", "マ"], ["mi", "ミ"], ["mu", "ム"], ["me", "メ"], ["mo", "モ"], ["ya", "ヤ"], ["yu", "ユ"], ["yo", "ヨ"], ["ra", "ラ"], ["ri", "リ"], ["ru", "ル"], ["re", "レ"], ["ro", "ロ"], ["wa", "ワ"], ["n", "ン"], ["wo", "ヲ"],
                    ["ga", "ガ"], ["gi", "ギ"], ["gu", "グ"], ["ge", "ゲ"], ["go", "ゴ"], ["za", "ザ"], ["dzi", "ジ"], ["zu", "ズ"], ["ze", "ゼ"], ["zo", "ゾ"], ["da", "ダ"], ["dji", "ヂ"], ["dzu", "ヅ"], ["de", "デ"], ["do", "ド"], ["ba", "バ"], ["bi", "ビ"], ["bu", "ブ"], ["be", "ベ"], ["bo", "ボ"], ["pa", "パ"], ["pi", "ピ"], ["pu", "プ"], ["pe", "ペ"], ["po", "ポ"]]],
    [ <?php print(HIRAGANAYOON); ?>, "H+", "hiragana", [["kya", "きゃ"], ["kyu", "きゅ"], ["kyo", "きょ"], ["sha", "しゃ"], ["shu", "しゅ"], ["sho", "しょ"], ["cha", "ちゃ"], ["chu", "ちゅ"], ["cho", "ちょ"], ["nya", "にゃ"], ["nyu", "にゅ"], ["nyo", "にょ"], ["hya", "ひゃ"], ["hyu", "ひゅ"], ["hyo", "ひょ"], ["mya", "みゃ"], ["rya", "りゃ"], ["gya", "ぎゃ"], ["zya", "じゃ"], ["dya", "ぢゃ"], ["myu", "みゅ"], ["ryu", "りゅ"], ["gyu", "ぎゅ"], ["zyu", "じゅ"], ["dyu", "ぢゅ"], ["myo", "みょ"], ["ryo", "りょ"], ["gyo", "ぎょ"], ["zyo", "じょ"], ["dyo", "ぢょ"], ["bya", "びゃ"], ["byu", "びゅ"], ["byo", "びょ"], ["pya", "ぴゃ"], ["pyu", "ぴゅ"], ["pyo", "ぴょ"]]],
    [ <?php print(KATAKANAYOON); ?>, "K+", "katakana", [["kya", "キャ"], ["kyu", "キュ"], ["kyo", "キョ"], ["sha", "シャ"], ["shu", "シュ"], ["sho", "ショ"], ["cha", "チャ"], ["chu", "チュ"], ["cho", "チョ"], ["nya", "ニャ"], ["nyu", "ニュ"], ["nyo", "ニョ"], ["hya", "ヒャ"], ["hyu", "ヒュ"], ["hyo", "ヒョ"], ["mya", "ミャ"], ["rya", "リャ"], ["gya", "ギャ"], ["zya", "ジャ"], ["dya", "ヂャ"], ["myu", "ミュ"], ["ryu", "リュ"], ["gyu", "ギュ"], ["zyu", "ジュ"], ["dyu", "ヂュ"], ["myo", "ミョ"], ["ryo", "リョ"], ["gyo", "ギョ"], ["zyo", "ジョ"], ["dyo", "ヂョ"], ["bya", "ビャ"], ["byu", "ビュ"], ["byo", "ビョ"], ["pya", "ピャ"], ["pyu", "ピュ"], ["pyo", "ピョ"]]]
];

var selection = [];
var card = [];
var side = 0;
var face = 0; // RND, NIHON, ROMANJI

function firstload() {
    selectAll();
    refresh();
}

function pickCard() {
    current = [];
    value = 0;
    for (var i = 0; i < selection.length; i++) {
        if (! selection[i])
            continue;
        current[value++] = i;
    }
    if (value == 0)
        return false;
    value = current[Math.floor(Math.random() * current.length)];
    id = Math.floor(Math.random() * (data[value][3]).length);
    card[0] = data[value][3][id][0];
    card[1] = data[value][3][id][1];
    card[2] = data[value][2];
    return true;
}

function countCards() {
    value = 0;
    for (var i = 0; i < selection.length; i++) {
        if (! selection[i])
            continue;
        value += (data[i][3]).length;
    }
    document.getElementById("number").innerHTML = ":::: " + value + " cards ::::";
}

function refresh() {
    printButtons();
    if (! pickCard()) {
        dame();
        return;
    }
    if (face == 0)
        side = Math.floor(Math.random() * 2);
    if (face == 1)
        side = 1;
    if (face == 2)
        side = 0;
    printCard();
}

function returnCard() {
    side = (side + 1) % 2;
    printCard();
}

function nextFace() {
    face = (face + 1) % 3;
    refresh();
}

function printCard() {
    $("#txt").css("color", "#EEEEEE");
    $("#txt").css("font-size", "170px");
    document.getElementById("txt").innerHTML = card[side];
    $("#src").hide();
    if (side == 0) {
        $("#txt").css("font-size", "120px");
        document.getElementById("src").innerHTML = card[2];
        $("#src").show();
    }
    $("#number").show();
    $("#refresh").show();
}

function dame() {
    $("#txt").css("color", "#DC322F");
    document.getElementById("txt").innerHTML = "X";
    $("#number").hide();
    $("#src").hide();
    $("#refresh").hide();
}

function selectAll() {
    for (var i = 0; i < data.length; i++)
        selection[i] = true;
    countCards();
}

function turnSet(id) {
    selection[id] = ! selection[id];
    countCards();
    refresh();
}

function printButtons() {
    for (var i = 0; i < selection.length; i++) {
        color = "#268BD2";
        if (! selection[i])
            color = "#DC322F";
        $("#set_" + i).css("background-color", color);
        document.getElementById("set_" + i).innerHTML = data[i][1];
    }
    color = "#268BD2";
    if (face == 1)
        color = "#859900";
    if (face == 2)
        color = "#DC322F";
    $("#face").css("background-color", color);
}
        </script>
        <style>
	     body {
		 font-family: Verdana, Geneva, sans-serif;
		 background-color: #002b36;
		 color: #839496;
	     }
	     p {
		 text-align: center;
		 margin-bottom: 0px;
		 margin-top: 3px;
	     }
	     a {
		 text-decoration: none;
		 color: #ABBCBE;
	     }
	     .centered {
		 display: table;
		 position: relative;
		 left: 50%;
		 /* bring your own prefixes */
		 transform: translate(-50%, 0%);
	     }
	     #square {
		 width: <?php print(WIDTH); ?>px;
		 height: <?php print(HEIGHT); ?>px;
		 margin: 0px;
		 padding: 0px;
		 border: 0px;
		 position: relative;
	     }
	     #buttons {
		 float: left;
		 width: <?php print(BUTTON_PLAY * 5 + 20); ?>px;
		 padding: inherit;
		 border: inherit;
	     }
	     .buttons {
		 vertical-align: middle;
		 text-align: center;
		 border-radius: 50%;
		 cursor: pointer;
		 display: inline-block;
		 padding: inherit;
		 background-color: #268BD2;
		 color: #EEEEEE;
		 text-transform: uppercase;
		 margin: 2px;
		 float: left;
		 width: <?php print(BUTTON_PLAY); ?>px;
		 height: <?php print(BUTTON_PLAY); ?>px;
		 line-height: <?php print(BUTTON_PLAY); ?>px;
		 max-height: <?php print(BUTTON_PLAY); ?>px;
		 font-size: 32px;
	     }
	     .next {
		 vertical-align: middle;
		 text-align: center;
		 border-radius: 50%;
		 cursor: pointer;
		 display: inline-block;
		 padding: inherit;
		 background-color: #268BD2;
		 color: #EEEEEE;
		 margin: 2px;
		 float: left;
		 width: 80px;
		 height: 80px;
		 line-height: 80px;
		 max-height: 80px;
		 font-size: 80px;
	     }
	     #card {
		 width: 100%;
		 height: <?php print(HCARD); ?>px;
		 margin: inherit;
		 padding: inherit;
		 border: inherit;
		 position: relative;
		 float: left;
		 cursor: pointer;
	     }
	     #card #src {
                 font-size: 15px;
                 color: #CCCCCC;
                 display: none;
	     }
             #card #txt, #card #src {
                 width: 100%;
                 vertical-align: middle;
                 text-align: center;
                 text-transform: uppercase;
                 padding: inherit;
                 margin: inherit;
                 border: inherit;
                 position: relative;
                 float: left;
             }
	     #card #txt {
                 color: #EEEEEE;
                 padding-top: <?php print(floor((HCARD - 180) / 3)); ?>px;
	     }
             #number {
                 width: 100%;
                 vertical-align: middle;
                 text-align: center;
                 text-transform: uppercase;
                 padding: inherit;
                 margin: inherit;
                 border: inherit;
                 position: relative;
                 float: left;
                 font-size: 65%;
             }
        </style>
    </head>
    <body onload="firstload()">
        <div id="square" class="centered">
            <div id="buttons" class="centered">
<?php
    for ($i = 0; $i < 4; $i++)
         printf("<div class=\"buttons\" id=\"set_%d\" onclick=\"turnSet(%d);\"></div>", $i, $i);
?>
                <div class="buttons" id="face" onclick="nextFace();"></div>
                <div id="number"></div>
            </div>
            <div id="card" onclick="returnCard();">
                <div id="txt" class="centered"></div>
                <div id="src" class="centered"></div>
            </div>
            <div class="centered" style="position:absolute;bottom:0px;">
                <div id="refresh" onclick="refresh();" class="next">⟳</div>
            </div>
        </div>
        <p style="font-size:45%;">Generated in <?php print(microtime(true) - $timestart); ?> seconds::::<a href="https://github.com/er-1/kana">GitHub</a></p>
    </body>
    </html>