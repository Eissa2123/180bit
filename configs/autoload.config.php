<?php
function isdate($date)
{
    return (date('Y-m-d', strtotime($date)) == $date) or (date('Y/m/d', strtotime($date)) == $date);
}
function istime($time)
{
    return preg_match("#([0-1]{1}[0-9]{1}|[2]{1}[0-3]{1}):[0-5]{1}[0-9]{1}#", $time);
    //return preg_match("#([1-2][0-3]|[01]?[1-9]):([0-5]?[0-9]):([0-5]?[0-9])#", $time);
}
function endwith($string, $word)
{
    return (substr($string, -strlen($word)) === $word);
}

//*
function checked($datas, $key3, $index, $key1 = null, $key2 = null, $value1 = null)
{
    if (is_array($datas) and isset($datas[$key1]) and is_array($datas[$key1]) and count($datas[$key1]) > 0) {
        /*R(array(
            $key1, $key2, $value1
        ));*/
        foreach ($datas[$key1] as $value) {
            if (isset($value[$key2]) and $value[$key2] === $value1) {
                if (isset($value[$key3]) and $value[$key3] === $index) {
                    /*R($value);
                    R(array(
                        $value[$key1], $value[$key3]
                    ));*/
                    return 'checked="checked"';
                }
            }
        }
    }
    return CNF_EMP;
}

//*
function label($datas, $key1 = null, $key2 = null)
{
    //R($datas['Privalages'][$key1]);

    return CNF_EMP;
}

function in_keys($key, $array)
{
    if (is_array($array) and count($array) > 0) {
        foreach ($array as $k => $v) {
            if ($k === $key) {
                return true;
            }
        }
    }
    return false;
}
function startwith($string, $word)
{
    return (substr($string, 0, strlen($word)) === $word);
}
function timeformat($time)
{
    if (istime($time)) {
        return str_replace(':', 'h', date('h:m', strtotime($time)));
    }
    return CNF_EMP;
}
function dateformat($date)
{
    if (isdate($date)) {
        return $date;
    }
    return CNF_EMP;
}
function clicked($datas, $button)
{
    if (isset($datas['POSTS'])) {
        return isset($datas['POSTS'][$button]);
    }
    return false;
}
function D($datas, $file = null, $line = null)
{
    if ($file != null && $line != null) {
        var_dump(
            array(
                'SRC' => $file . ' [' . $line . ']',
                'DTS' => $datas,
            )
        );
    } else {
        echo '<pre>';
        var_dump($datas);
        echo '</pre>';
    }
}
function I($value1, $key1, $value2, $key2, $b = false)
{

    /*$inarray = false;
    if(isset($value1[$key1]) and isset($value2[$key2]) and is_array($value2[$key2])){
        $v1 = $value1[$key1];
        $v2 = $value2[$key2];
        $inarray = in_array($v1, $v2);
    }
    return $inarray;*/

    if (isset($value1[$key1]) and isset($value2[$key2]) /*and is_array($value2[$key2])*/) {
        $v1 = $value1[$key1];
        $v2 = $value2[$key2];
        return ($v1 == $v2);
    }
    return false;
}

function K($value1, $key1, $value2, $value3, $key)
{
    $value = array();
    if (L($value2, $key)) {
        $value = $value2;
    } elseif (L($value3, $key)) {
        $value = $value3;
    }
    $inarray = I($value1, $key1, $value, $key);
    return $inarray;
}

function R($datas, $file = null, $line = null)
{
    echo '<pre>';
    if ($file != null && $line != null) {
        print_r(
            array(
                'SRC' => $file . ' [' . $line . ']',
                'DTS' => $datas,
            )
        );
    } else {
        print_r($datas);
    }
    echo '</pre>';
}
function N($in)
{
    return (0);
}
function S($in, $key)
{
    return (isset($in[$key]));
}
function E($in, $key)
{
    if (isset($in['LPosts']) and isset($in['LPosts'][$key])) {
        return $in['LPosts'][$key];
    }
    return '';
}
function A($in)
{
    return (S($in) and !E($in));
}
function O($in, $key, $state = true)
{
    if (S($in['AUTO'], $key)) {
        $value = $in['AUTO'][$key];
        return $value;
    }
    if ($state) {
        return array();
    } else {
        return CNF_EMP;
    }
}
function redirection($link)
{
    header('location:' . WLink($link));
}
function LClears($List, $position)
{

    return '';
}
// رجّع مصفوفة بمفاتيح lowercase (غير مُعمّقة يكفي لنا للمستوى الأول)
function _ci_top(array $a): array
{
    $out = [];
    foreach ($a as $k => $v) {
        $out[is_string($k) ? strtolower($k) : $k] = $v;
    }
    return $out;
}

// مصادر القراءة بالترتيب: POSTS ثم LPosts ثم Cells ثم $in نفسه ثم $_POST ثم $_GET
function _sources($in): array
{
    $src = [];
    if (isset($in['POSTS'])  && is_array($in['POSTS']))  $src[] = _ci_top($in['POSTS']);
    if (isset($in['LPosts']) && is_array($in['LPosts'])) $src[] = _ci_top($in['LPosts']);
    if (isset($in['Cells'])  && is_array($in['Cells']))  $src[] = _ci_top($in['Cells']);
    if (is_array($in))                                     $src[] = _ci_top($in);
    if (!empty($_POST))                                    $src[] = _ci_top($_POST);
    if (!empty($_GET))                                     $src[] = _ci_top($_GET);
    return $src;
}

function P($in, $key)
{
    $k = strtolower((string)$key);
    foreach (_sources($in) as $arr) {
        if (array_key_exists($k, $arr)) {
            return $arr[$k];
        }
    }
    return CNF_EMP; // نفس الافتراضي عندك
}

function Y($in, $key)
{
    $v = P($in, $key);
    return is_array($v) ? $v : [];
}

function G($in, $key)
{
    return S($in['Params'], $key) ? $in['Params'][$key] : CNF_EMP;
}
function T($in, $key)
{
    return S($in[$key]) ? $in[$key] : CNF_EMP;
}
function L($in, $key)
{
    return (isset($in[$key]) and is_array($in[$key]) and count($in[$key]) > 0);
}
function V($in, $key, $subkey = null, $subsubkey = null)
{
    if ($in == null) {
        return CNF_EMP;
    } else if (!is_array($in)) {
        return $in;
    } else {
        if ($key == null or !isset($in[$key]) or $in[$key] === null) {
            return CNF_EMP;
        } else if (isset($in[$key]) and !is_array($in[$key])) {
            return $in[$key];
        } else if (isset($in[$key]) and is_array($in[$key])) {
            if ($subkey === null or !isset($in[$key][$subkey]) or $in[$key][$subkey] === null) {
                return CNF_EMP;
            } else if (isset($in[$key][$subkey]) and !is_array($in[$key][$subkey])) {
                return $in[$key][$subkey];
            } else if (isset($in[$key][$subkey]) and is_array($in[$key][$subkey])) {
                if ($subsubkey == null or !isset($in[$key][$subkey][$subsubkey]) or $in[$key][$subkey][$subsubkey] === null) {
                    return CNF_EMP;
                } else if (isset($in[$key][$subkey]) and !is_array($in[$key][$subkey][$subsubkey])) {
                    return $in[$key][$subkey][$subsubkey];
                } else if (isset($in[$key][$subkey][$subsubkey]) and is_array($in[$key][$subkey][$subsubkey])) {
                    return CNF_EMP;
                }
            } else {
                return $in[$key];
            }
        } else {
            return CNF_EMP;
        }
    }

    return CNF_EMP;
}

function J($in1, $in2, $key, $subkey = null)
{
    if ($key == 'Paid') {
        //D($in1);
    }
    $v = null;
    if (isset($in1[$key]) and is_array($in1[$key]) and count($in1[$key]) > 0) {
        $v = $in1[$key];
    }
    if ($v == null or $v == '') {
        if (isset($in2[$key]) and is_array($in2[$key]) and count($in2[$key]) > 0) {
            $v = $in2[$key];
        }
    }
    return $v;
}

function B($in, $key)
{
    $v = V($in, $key);
    if (is_string($v)) {
        $v = str_replace('-', '', $v);
    } else {
        $v = '';
    }
    return $v;
}
function percent($a, $b)
{
    if ((float) $a !== 0.0) {
        $r = ((float) $b) / ((float) $a) * 100;
        $r = number_format($r, NBR_FORMAT, '.', '');
        return (float) $r;
    }
    return 0;
}
function X($key, $haserrors)
{
    if ($haserrors) {
        return (isset($LPosts) and isset($LPosts[$key])) ? $LPosts[$key] : CNF_EMP;
    }
    return '';
}
function Saveimage($filename)
{
    $folders = pathinfo($filename);
    /*R(array(
        $folders['dirname'],
        HTEMPS.$filename,
        HPICTURES.$filename
    ));*/
    if (!file_exists(HPICTURES . $folders['dirname'])) {
        @mkdir(HPICTURES . $folders['dirname'], 0777, true);
    }
    if (file_exists(HTEMPS . $filename)) {
        try {
            @copy(HTEMPS . $filename, HPICTURES . $filename);
            @unlink(HTEMPS . $filename);
        } catch (Exeption $e) {
            //D($e);
        }
    }
}
function Savefile($filename)
{
    $folders = pathinfo($filename);
    R(array(
        $folders['dirname'],
        HTEMPS . $filename,
        HFILES . $filename
    ));
    if (!file_exists(HPICTURES . $folders['dirname'])) {
        @mkdir(HFILES . $folders['dirname'], 0777, true);
    }
    if (file_exists(HTEMPS . $filename)) {
        try {
            @copy(HTEMPS . $filename, HFILES . $filename);
            @unlink(HTEMPS . $filename);
        } catch (Exeption $e) {
            //D($e);
        }
    }
}
function F($in, $key, $multiple = false)
{
    $key = strtolower($key);
    $upload = isset($in['FILES'][$key]) ? $in['FILES'][$key] : CNF_EMP;
    if (!$multiple) {
        if (isset($upload['name']) and $upload['name'] !== '') {
            $input = explode('.', $upload["name"]);
            if (count($input) > 1) {
                $extention = strtoupper($input[count($input) - 1]);
                $id = UID();
                $folders = date('Y/m/');
                if (!file_exists(HTEMPS . $folders)) {
                    @mkdir(HTEMPS . $folders, 0777, true);
                }
                $filename = $folders . $id . '.' . $extention;
                if (isset($upload['tmp_name']) and $upload['tmp_name'] !== '') {
                    move_uploaded_file($upload['tmp_name'], HTEMPS . $filename);
                    return $filename;
                }
            }
        }
    } else {
        $uploads = isset($in['FILES'][$key]) ? $in['FILES'][$key] : CNF_EMP;

        $files = [];

        if (isset($upload['name']) and count($uploads['name']) > 0 and $uploads['error'] != 4) {
            foreach ($upload['name'] as $k => $v) {
                $input = explode('.', $upload["name"][$k]);
                if (count($input) > 1) {
                    $extention = strtoupper($input[1]);
                    $id = UID();
                    $folders = date('Y/m/');
                    if (!file_exists(HTEMPS . $folders)) {
                        mkdir(HTEMPS . $folders, 0777, true);
                    }
                    $filename = $folders . $id . '.' . $extention;
                    if (isset($upload['tmp_name'][$k]) and $upload['tmp_name'][$k] !== '') {
                        move_uploaded_file($upload['tmp_name'][$k], HTEMPS . $filename);
                        $files[] = array(
                            'Code'   => $id,
                            'Name'   => $v,
                            'URL'    => $filename
                        );
                    }
                }
            }
        }
        return $files;
    }
    return CNF_EMP;
}
function autoload($Classname)
{
    global  $DEBUG;
    if (endwith($Classname, 'Controller')) {
        if (file_exists(CONTROLLERS . $Classname . '.php')) {
            $DEBUG['LOADED']['Controller'][$Classname] = CONTROLLERS . $Classname . '.php';
            require_once(CONTROLLERS . $Classname . '.php');
        }
    } else if (endwith($Classname, 'View')) {
        if (file_exists(VIEWS . $Classname . '.php')) {
            $DEBUG['LOADED']['View'][$Classname] = VIEWS . $Classname . '.php';
            require_once(VIEWS . $Classname . '.php');
        }
    } else if (endwith($Classname, 'Model')) {
        if (file_exists(MODELS . $Classname . '.php')) {
            $DEBUG['LOADED']['Model'][$Classname] = MODELS . $Classname . '.php';
            require_once(MODELS . $Classname . '.php');
        }
    } else if (endwith($Classname, 'Core')) {
        if (file_exists(CORES . $Classname . '.php')) {
            $DEBUG['LOADED']['Core'][$Classname] = CORES . $Classname . '.php';
            require_once(CORES . $Classname . '.php');
        }
    } else if (endwith($Classname, 'Lang')) {
        if (file_exists(LANGS . $Classname . '.php')) {
            $DEBUG['LOADED']['Lang'][$Classname] = LANGS . $Classname . '.php';
            require_once(LANGS . $Classname . '.php');
        }
    } else {
        if (file_exists(LIBS . 'Tools/' . $Classname . '.php')) {
            $DEBUG['LOADED']['Lib'][$Classname] = LIBS . 'Tools/' . $Classname . '.php';
            require_once(LIBS . 'Tools/' . $Classname . '.php');
        } else if (file_exists(LIBS . $Classname . '/' . $Classname . '.php')) {
            $DEBUG['LOADED']['Lib'][$Classname] = LIBS . $Classname . '/' . $Classname . '.php';
            require_once(LIBS . $Classname . '/' . $Classname . '.php');
        } else if (strtolower($Classname) == 'pdf') {
            require_once(LIBS . 'PDF/PDF.php');
        } else if (strtolower($Classname) == 'fpdf') {
            require_once(LIBS . 'FPDF/fpdf.php');
        }
    }
}
function UID()
{
    if (function_exists('com_create_guid')) {
        $guid = com_create_guid();
        return str_replace(str_split('{-}'), '', $guid);
    } else {
        mt_srand((float) microtime() * 10000);
        $guid = strtoupper(md5(uniqid(rand(), true)));
        return $guid;
    }
}
function array2json($datas)
{
    $json = '';
    if ($datas !== null) {
        if (is_array($datas)) {
            $json .= '[';
            foreach ($datas as $key => $value) {
                $json .= '"' . $key . '" : ';
                $json .= array2json($value);
                $json .= ',';
            }
            $json = trim($json, ',');
            $json .= ']';
        } else if (is_numeric($datas)) {
            $json = $datas;
        } else if (is_bool($datas)) {
            $json = $datas;
        } else if (is_string($datas)) {
            $json = '"' . $datas . '"';
        }
    } else {
        $json = null;
    }
    return $json;
}
function token($length)
{
    $generator = new RSG;
    return $generator->generate($length);
}
function WLink($linkcontent = null, $linklang = null, $statelang = false)
{
    if ($linklang === null or !in_array(strtolower($linklang), array(LNG_AR, LNG_EN, LNG_FR))) {
        $linklang = strtolower(LNG);
    }
    if ($linkcontent === null) {
        $linkcontent = '';
    }

    $url = '';
    if ($statelang) {
        //echo(URL);
        $url = explode('/', URL);

        if (isset($url[0])) {
            $url[0] = $linklang;
        }

        $url = implode('/', $url);
        //echo('URL1 : ' . $url . '<br />');
    } else {
        $linklang .= '/';
        $url = $linklang . $linkcontent;

        //echo('URL2 : ' . $url . '<br />');
    }

    return WEB . $url;
}
function HLink($linkcontent)
{
    return HOST . $linkcontent;
}
function Render($tempalate, $in)
{
    global $DEBUG;

    $send = $in;

    if (file_exists($tempalate)) {
        $DEBUG['LOADED']['RENDER']['UI'][] = $tempalate;
        if (isset($send['Errors']) and count($send['Errors']) === 0) {
            unset($send['Errors']);
        }
        extract($send);
        if (isset($Errors)) {
            if (count($Errors) === 0) {
                unset($Errors);
            } else {
                $Errors = true;
            }
        }
        if (isset($Success) and $Success === false) {
            $Errors = true;
            unset($Success);
        } else if (isset($Errors) and (!is_array($Errors) or count($Errors) === 0)) {
            unset($Errors);
        }

        require_once($tempalate);
    } else {
        $tempalate = UI . 'error/e404' . TMP;
        require_once($tempalate);
    }
}
function DatetimeToString($datetime)
{
    global $lang;

    $date1 = new DateTime(date('Y-m-d H:i:s'));
    $date2 = new DateTime($datetime);

    $interval = $date1->diff($date2);

    $info = '{B} ';

    if ($interval->y > 0) {
        if ($info !== '{B} ') {
            $info .= '{A}';
        }
        if ($interval->y == 1) {
            $info .= ' {y}';
        } else {
            $info .= $interval->y . ' {Y}';
        }
    }
    if ($interval->m > 0) {
        if ($info !== '{B} ') {
            $info .= '{A}';
        }
        if ($interval->m == 1) {
            $info .= ' {m}';
        } else {
            $info .= $interval->y . ' {M}';
        }
    }
    if ($interval->d > 0) {
        if ($info !== '{B} ') {
            $info .= '{A}';
        }
        if ($interval->d == 1) {
            $info .= ' {d}';
        } else {
            $info .= $interval->d . ' {D}';
        }
    }
    if ($interval->h > 0) {
        if ($info !== '{B} ') {
            $info .= '{A}';
        }
        if ($interval->h == 1) {
            $info .= ' {h}';
        } else {
            $info .= $interval->h . ' {H}';
        }
    }
    if ($interval->i > 0) {
        if ($info !== '{B} ') {
            $info .= '{A}';
        }
        if ($interval->i == 1) {
            $info .= ' {i}';
        } else {
            $info .= $interval->i . ' {I}';
        }
    }
    if ($interval->y == 0 and $interval->m == 0 and $interval->d == 0 and $interval->h == 0 and $interval->i == 0 and $interval->s > 0) {
        $info = ' {s}';
    }

    $info .= ' {b}';
    $interval->infoKey = $info;

    if ($lang == 'ar') {
        $info = str_replace('{A}', ' و ', $info);
        $info = str_replace('{B}', 'منذ', $info);
        $info = str_replace('{b}', '', $info);
        $info = str_replace('{Y}', 'سنوات', $info);
        $info = str_replace('{M}', 'شهور', $info);
        $info = str_replace('{D}', 'ايام', $info);
        $info = str_replace('{H}', 'ساعات', $info);
        $info = str_replace('{I}', 'دقائق', $info);
        $info = str_replace('{S}', 'ثوان', $info);
        $info = str_replace('{y}', ' سنة ', $info);
        $info = str_replace('{m}', ' شهر ', $info);
        $info = str_replace('{d}', ' يوم ', $info);
        $info = str_replace('{h}', ' ساعة ', $info);
        $info = str_replace('{i}', ' دقيقة ', $info);
        $info = str_replace('{s}', 'اقل من دقيقة', $info);
    } else if ($lang == 'en') {
        $info = str_replace('{A}', ', ', $info);
        $info = str_replace('{B} ', '', $info);
        $info = str_replace('{b}', ' ago', $info);
        $info = str_replace('{Y}', 'years', $info);
        $info = str_replace('{M}', 'months', $info);
        $info = str_replace('{D}', 'days', $info);
        $info = str_replace('{H}', 'hours', $info);
        $info = str_replace('{I}', 'minutes', $info);
        $info = str_replace('{S}', 'seconds', $info);
        $info = str_replace('{y}', ' year ', $info);
        $info = str_replace('{m}', ' month ', $info);
        $info = str_replace('{d}', ' day ', $info);
        $info = str_replace('{h}', ' hour ', $info);
        $info = str_replace('{i}', ' minute ', $info);
        $info = str_replace('{s}', ' minute ago', $info);
    } else if ($lang == 'fr') {
        $info = str_replace('{A}', ', ', $info);
        $info = str_replace('{B} ', '', $info);
        $info = str_replace('{b}', ' ago', $info);
        $info = str_replace('{Y}', 'years', $info);
        $info = str_replace('{M}', 'months', $info);
        $info = str_replace('{D}', 'days', $info);
        $info = str_replace('{H}', 'hours', $info);
        $info = str_replace('{I}', 'minutes', $info);
        $info = str_replace('{S}', 'seconds', $info);
        $info = str_replace('{y}', ' year ', $info);
        $info = str_replace('{m}', ' month ', $info);
        $info = str_replace('{d}', ' day ', $info);
        $info = str_replace('{h}', ' hour ', $info);
        $info = str_replace('{i}', ' minute ', $info);
        $info = str_replace('{s}', ' minute ago', $info);
    }

    $interval->infoValue = $info;
    return '<label style="direction:ltr;font-weight:lighter;">' . $info . '</label>';
}
function Adapter($value, $lenght = CNF_LEN)
{
    $subvalue = "";

    if (is_numeric($lenght) and $lenght > 0) {
        $size = mb_strlen($value, 'UTF-8');
        if ($size >= $lenght) {
            $subvalue = mb_substr($value, 0, $lenght, "UTF-8");
        } else if ($size < $lenght) {
            $subvalue = $value;
        }
    } else {
        $subvalue = $value;
    }

    return $subvalue;
}
function loadimage($image)
{
    // data URI جاهزة؟ رجّعها
    if (strpos($image, 'data:') === 0) return $image;

    // نمط: db:<id> => اسحب من القاعدة
    if (preg_match('/^db:(\d+)$/', (string)$image, $m)) {
        $id = (int)$m[1];
        $pdo = $GLOBALS['PDO']; // تأكد اتصالك
        $stmt = $pdo->prepare('SELECT mime_type, data FROM attachments WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row && !empty($row['data'])) {
            $mime = $row['mime_type'] ?: 'image/png';
            return 'data:' . $mime . ';base64,' . base64_encode($row['data']);
        }
        return ''; // ما لقى
    }

    // غير كذا: اعتبره مسار/رابط واقرأ من القرص أولاً ثم URL
    $url  = $image;
    $path = rtrim($_SERVER['DOCUMENT_ROOT'], '/\\') . parse_url($url, PHP_URL_PATH);
    if (is_file($path)) {
        $data = @file_get_contents($path);
        $mime = function_exists('mime_content_type') ? mime_content_type($path) : 'image/png';
        return 'data:' . $mime . ';base64,' . base64_encode($data);
    }
    // fallback هادئ
    $data = @file_get_contents($url);
    if ($data !== false) {
        $mime = 'image/png';
        if (isset($http_response_header)) {
            foreach ($http_response_header as $h) {
                if (stripos($h, 'Content-Type:') === 0) {
                    $mime = trim(substr($h, 13)) ?: $mime;
                    break;
                }
            }
        }
        return 'data:' . $mime . ';base64,' . base64_encode($data);
    }
    return '';
}


function Has($action, $item, $role)
{
    $x = array();
    $actions = explode('|', $action);
    $items = explode('|', $item);
    if (is_array($items) && count($items) > 0) {
        foreach ($items as $item) {
            foreach ($actions as $action) {
                if (AuthentificationController::check($action, $item) == $role) {
                    return true;
                }
            }
        }
    }
    return false;
}

function loadstyle($style)
{
    $data = base64_encode(file_get_contents($style));
    $src = 'data: ' . mime_content_type($style) . ';base64,' . $data;
    return $src;
}

function loadscript($script)
{
    $data = base64_encode(file_get_contents($script));
    $src = 'data: ' . mime_content_type($script) . ';base64,' . $data;
    return $src;
}

function Createfile($fullname, $content)
{
    $f = fopen($fullname, "w+");
    //fwrite($f, pack("CCC",0xef,0xbb,0xbf));
    fwrite($f, $content);
    fclose($f);
}

function Updatefile($fullname, $content)
{
    $f = fopen($fullname, "a");
    fwrite($f, $content);
    fclose($f);
}

function Createzip($fullname)
{
    $zip = new ZIP;
    if ($zip->open($fullname, ZipArchive::CREATE) === TRUE) {
        $zip->addDir(HOST, basename(HOST));
        $zip->close();
    }
}

function Createzips($in, $out)
{
    $zip = new ZIP;
    if ($zip->open($out, ZipArchive::CREATE) === TRUE) {
        $zip->addDir($in, basename($in));
        $zip->close();
    }
}

function Downloadfile($filename, $fullname, $type)
{
    $types = [SQL, ZIP];
    if (in_array($type, $types)) {
        $content = '';
        switch ($type) {
            case SQL:
                $content = 'text/txt';
                break;
            case ZIP:
                $content = 'application/zip';
                break;
        }
        /*header("Content-Type: ".$content);
        header("Content-Length: ".filesize($fullname)."\n\n");
        header("Content-Disposition: attachment; filename=$filename");*/
        switch ($type) {
            case SQL:
                echo file_get_contents($fullname);
                break;
            case ZIP:
                header("Content-Transfer-Encoding: Binary");
                while (ob_get_level()) {
                    ob_end_clean();
                }
                readfile($fullname);
                exit;
                ob_start();
                break;
        }
    }
}

function DeleteFolder($directory)
{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($files as $fileinfo) {
        $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
        $todo($fileinfo->getRealPath());
    }
}

function JS($script)
{
    $out = '<script type="text/javascript">';;
    $out .= 'var datas = JSON.parse(' . $script . ')';
    $out .= 'console.log(datas);';
    $out .= '</script>';

    echo $out;
}

spl_autoload_register('autoload');
