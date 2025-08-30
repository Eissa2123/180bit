
<?php
class SaleController extends Controller
{

   private $LayerController;
   private $LayerLang;

   private $SaleModel;
   private $SaleLang;
   private $SaleView;


   public function __construct()
   {
      parent::__construct();

      $this->LayerController = new LayerController();
      $this->LayerLang = LayerLang::Translate();

      $this->SaleModel = new SaleModel();
      $this->SaleLang = SaleLang::Translate();
      $this->SaleView = new SaleView();
   }

   public function index($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SaleCore();
      $SaleCore->LoadForm($in);
      $send['LPosts'] = $SaleCore->Preper(Core::FINDEX);
      $send = array_merge($send, $this->SaleModel->index($send['LPosts']));
      if (L($send, 'LSales')) {
         foreach ($send['LSales'] as $KSale => $VSale) {

            $VSale['TTC'] = $this->Format($VSale['TTC']);
            $VSale['Paids'] = $this->Format($VSale['Paids']);
            $VSale['Return'] = $this->Format($VSale['Return']);
            $VSale['Rest'] = $this->Format($VSale['Rest']);

            $send['LSales'][$KSale] = $VSale;
         }
         foreach ($send['TPR'] as $K => $V) {
            $V = $this->Format($V);
            $send['TPR'][$K] = $V;
         }
         $send['Pager'] = $this->Pager($send);
         if ($send['Pager'] === null) {
            unset($send['Pager']);
         }
      }

      $send = array_merge($send, $this->Lengths());
      $this->SaleView->index($send);
   }

   public function display($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SaleCore();
      $SaleCore->LoadParams($in);
      $send['Errors'] = $SaleCore->Check(CORE::FDISPLAY);
      if (count($send['Errors']) === 0) {
         unset($send['Errors']);
         $send['LPosts'] = $SaleCore->Preper(Core::FDISPLAY);
         $send = array_merge($send, $this->SaleModel->display($send['LPosts']));
      }
      if (L($send, 'Cells')) {

         $Cells = $send['Cells'];

         if (L($Cells, 'Products')) {
            foreach ($Cells['Products'] as $KCell => $VCell) {

               $VCell['Price'] = $this->Format($VCell['Price']);
               $VCell['HT'] = $this->Format($VCell['HT']);
               $VCell['Tax'] = $this->Format($VCell['Tax']);

               $Cells['Products'][$KCell] = $VCell;
            }
         }
         if (L($Cells, 'Payments')) {
            foreach ($Cells['Payments'] as $KCell => $VCell) {
               $VCell['Amount'] = $this->Format($VCell['Amount']);

               $Cells['Payments'][$KCell] = $VCell;
            }
         }

         $Cells['HT'] = $this->Format($Cells['HT']);
         $Cells['Tax'] = $this->Format($Cells['Tax']);
         $Cells['TVA'] = $this->Format($Cells['TVA']);
         $Cells['Gift'] = $this->Format($Cells['Gift']);
         $Cells['Reduction'] = $this->Format($Cells['Reduction']);
         $Cells['Expense'] = $this->Format($Cells['Expense']);
         $Cells['Paid'] = $this->Format($Cells['Paid']);
         $Cells['Rest'] = $this->Format($Cells['Rest']);
         $Cells['TTC'] = $this->Format($Cells['TTC']);
         $Cells['Return'] = $this->Format($Cells['Return']);
         $Cells['Paids'] = $this->Format($Cells['Paids']);

         $send['Cells'] = $Cells;

         $this->SaleView->display($send);
      } else {
         $this->ErrorController->e404($send);
      }
   }

   public function print($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SaleCore();
      $SaleCore->LoadParams($in);
      $send['LPosts'] = $SaleCore->Preper(Core::FDISPLAY);

      $send = array_merge($send, $this->SaleModel->edit($SaleCore->Preper(Core::FDISPLAY)));

      if (L($send, 'Cells')) {
         $Cells = $send['Cells'];

         if (L($Cells, 'Products')) {

            foreach ($Cells['Products'] as $KProduct => $VProduct) {
               $VProduct['Price'] = $this->Format($VProduct['Price']);
               $VProduct['HT'] = $this->Format($VProduct['HT']);
               $VProduct['Tax'] = $this->Format($VProduct['Tax']);

               $Cells['Products'][$KProduct] = $VProduct;
            }
         }

         $Cells['Paids'] = $this->Format($Cells['Paids']);
         $Cells['TVA'] = $this->Format($Cells['TVA']);
         $Cells['Tax'] = $this->Format($Cells['Tax']);
         $Cells['Gift'] = $this->Format($Cells['Gift']);
         $Cells['HT'] = $this->Format($Cells['HT']);
         $Cells['TTC'] = $this->Format($Cells['TTC']);

         /*$Cells['TLV'] = array(
               '1' => 'Bobs Records',
               '2' => '310122393500003',
               '3' => '2022-04-25T15:30:00Z',
               '4' => '1000.00',
               '5' => '150.00',
            );*/

         //R($Cells['TLV']);

         $stamp = explode(' ', $Cells['CAT']);
         $stamp = implode('T', $stamp) . 'Z';

         //$Cells = $this->Formats($Cells);

         $Cells['TLV'] = [
            [1, COMPANY['CompanynameAR']],
            [2, COMPANY['TaxNumber']],
            [3, $stamp],
            [4, $Cells['TTC']],
            [5, $Cells['Tax']]
         ];

         /*$Cells['TLV'] = [
               [1, 'Bobs Records'],
               [2, '310122393500003'],
               [3, '2022-04-25T15:30:00Z'],
               [4, '1000.00'],
               [5, '150.00']
           ];*/

         $QRCode = new QRCode();
         $Cells['TLV'] = $QRCode->getTLV($Cells['TLV']);

         $send['Cells'] = $Cells;
      }

      //R(COMPANY);

      $this->SaleView->print($send);
   }

   public function prints($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SaleCore();

      $SaleCore->LoadForm($in);
      $SaleCore->LoadParams($in);
      $send['LPosts'] = $SaleCore->Preper(Core::FPRINT);

      $send = array_merge(
         $send,
         $this->SaleModel->print($send['LPosts'])
      );
      switch ($send['LPosts']['ID']) {
         case 1:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LSales')) {
                     foreach ($send['LSales'] as $KSale => $VSale) {

                        $VSale['TTC'] = $this->Format($VSale['TTC']);
                        $VSale['Paid'] = $this->Format($VSale['Paid']);
                        $VSale['Unpaid'] = $this->Format($VSale['Unpaid']);
                        $VSale['Ruturned'] = $this->Format($VSale['Ruturned']);

                        $send['LSales'][$KSale] = $VSale;
                     }

                     $send['Sales']['TTCs'] = $this->Format($send['Sales']['TTCs']);
                     $send['Sales']['Paids'] = $this->Format($send['Sales']['Paids']);
                     $send['Sales']['Unpaids'] = $this->Format($send['Sales']['Unpaids']);
                     $send['Sales']['Ruturneds'] = $this->Format($send['Sales']['Ruturneds']);
                  }
                  break;
               case 1:
                  $send['Totals']['Sales'] = $this->Format($send['Totals']['Sales']);
                  $send['Totals']['SalesReturns'] = $this->Format($send['Totals']['SalesReturns']);
                  $send['Totals']['CashsPayments'] = $this->Format($send['Totals']['CashsPayments']);
                  $send['Totals']['BankPayments'] = $this->Format($send['Totals']['BankPayments']);
                  $send['Totals']['SalesUnpaids'] = $this->Format($send['Totals']['SalesUnpaids']);
                  $send['Totals']['SalesNets'] = $this->Format($send['Totals']['SalesNets']);
                  $send['Totals']['SalesNetPaid'] = $this->Format($send['Totals']['SalesNetPaid']);
                  break;
            }
            break;
         case 2:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LCustomers')) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {
                        $VCustomer['Payements'] = $this->Format($VCustomer['Payements']);

                        if (L($VCustomer, 'Sales')) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['TTC'] = $this->Format($VSale['TTC']);

                              if (L($VSale, 'Payements')) {
                                 foreach ($VSale['Payements'] as $KPayement => $VPayement) {
                                    $VPayement['Amount'] = $this->Format($VPayement['Amount']);
                                    $VSale['Payements'][$KPayement] = $VPayement;
                                 }
                              }
                              $VCustomer['Sales'][$KSale] = $VSale;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  $send['Totals']['Sales'] = $this->Format($send['Totals']['Sales']);
                  break;
               case 1:
                  if (L($send, 'LPayements')) {
                     foreach ($send['LPayements'] as $KPayement => $VPayement) {
                        $VPayement['Amount'] = $this->Format($VPayement['Amount']);
                        $send['LPayements'][$KPayement] = $VPayement;
                     }
                  }
                  break;
            }
            $send['Totals']['Paids'] = $this->Format($send['Totals']['Paids']);
            break;
         case 3:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LCustomers')) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {
                        $VCustomer['Paid'] = $this->Format($VCustomer['Paid']);
                        $VCustomer['Unpaid'] = $this->Format($VCustomer['Unpaid']);
                        if (L($VCustomer, 'Sales')) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['TTC'] = $this->Format($VSale['TTC']);
                              $VSale['Paid'] = $this->Format($VSale['Paid']);
                              $VSale['Unpaid'] = $this->Format($VSale['Unpaid']);
                              $VCustomer['Sales'][$KSale] = $VSale;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  break;
               case 1:
                  if (L($send, 'LCustomers')) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {
                        $VCustomer['Paid'] = $this->Format($VCustomer['Paid']);
                        $VCustomer['Unpaid'] = $this->Format($VCustomer['Unpaid']);
                        if (L($VCustomer, 'Sales')) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['TTC'] = $this->Format($VSale['TTC']);
                              $VSale['Paid'] = $this->Format($VSale['Paid']);
                              $VSale['Unpaid'] = $this->Format($VSale['Unpaid']);
                              $VCustomer['Sales'][$KSale] = $VSale;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  break;
            }
            $send['Totals']['Paids'] = $this->Format($send['Totals']['Paids']);
            $send['Totals']['Unpaid'] = $this->Format($send['Totals']['Unpaid']);
            break;

         case 4:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LCustomers')) {

                     $send['Totals']['OpretionDebit'] = $this->Format($send['Totals']['OpretionDebit']);
                     $send['Totals']['OpretionCredit'] = $this->Format($send['Totals']['OpretionCredit']);
                     $send['Totals']['BalanceDebit'] = $this->Format($send['Totals']['BalanceDebit']);
                     $send['Totals']['BalanceCredit'] = $this->Format($send['Totals']['BalanceCredit']);

                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['OpretionDebit'] = $this->Format($VCustomer['OpretionDebit']);
                        $VCustomer['OpretionCredit'] = $this->Format($VCustomer['OpretionCredit']);
                        $VCustomer['BalanceDebit'] = $this->Format($VCustomer['BalanceDebit']);
                        $VCustomer['BalanceCredit'] = $this->Format($VCustomer['BalanceCredit']);

                        if (L($VCustomer, 'Statements')) {
                           foreach ($VCustomer['Statements'] as $KStatement => $VStatement) {

                              $VStatement['Opretion']['Debit'] = $this->Format($VStatement['Opretion']['Debit']);
                              $VStatement['Opretion']['Credit'] = $this->Format($VStatement['Opretion']['Credit']);

                              $VStatement['Balance']['Debit'] = $this->Format($VStatement['Balance']['Debit']);
                              $VStatement['Balance']['Credit'] = $this->Format($VStatement['Balance']['Credit']);

                              $VCustomer['Statements'][$KStatement] = $VStatement;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  break;
            }
            break;
         case 5:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LCustomers')) {

                     $send['Totals']['Sales'] = $this->Format($send['Totals']['Sales']);
                     $send['Totals']['Rutruns'] = $this->Format($send['Totals']['Rutruns']);
                     $send['Totals']['Nets'] = $this->Format($send['Totals']['Nets']);
                     $send['Totals']['Paids'] = $this->Format($send['Totals']['Paids']);
                     $send['Totals']['Inpaids'] = $this->Format($send['Totals']['Inpaids']);

                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {

                        $VCustomer['Sales'] = $this->Format($VCustomer['Sales']);
                        $VCustomer['Rutruns'] = $this->Format($VCustomer['Rutruns']);
                        $VCustomer['Nets'] = $this->Format($VCustomer['Nets']);
                        $VCustomer['Paids'] = $this->Format($VCustomer['Paids']);
                        $VCustomer['Inpaids'] = $this->Format($VCustomer['Inpaids']);

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  break;
            }
            break;

         case 6:
            switch ($send['LPosts']['General']) {
               case 0:
                  if (L($send, 'LCustomers')) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {
                        $VCustomer['TTCs'] = $this->Format($VCustomer['TTCs']);
                        $VCustomer['Rutruns'] = $this->Format($VCustomer['Rutruns']);
                        $VCustomer['Nets'] = $this->Format($VCustomer['Nets']);
                        $VCustomer['Paids'] = $this->Format($VCustomer['Paids']);
                        $VCustomer['Inpaids'] = $this->Format($VCustomer['Inpaids']);
                        if (L($VCustomer, 'Sales')) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['TTC'] = $this->Format($VSale['TTC']);
                              $VSale['Rutruns'] = $this->Format($VSale['Rutruns']);
                              $VSale['Nets'] = $this->Format($VSale['Nets']);
                              $VSale['Paids'] = $this->Format($VSale['Paids']);
                              $VSale['Inpaids'] = $this->Format($VSale['Inpaids']);
                              $VCustomer['Sales'][$KSale] = $VSale;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }
                  }
                  break;
               case 1:
                  if (L($send, 'LCustomers')) {
                     foreach ($send['LCustomers'] as $KCustomer => $VCustomer) {
                        $VCustomer['TTCs'] = $this->Format($VCustomer['TTCs']);
                        $VCustomer['Rutruns'] = $this->Format($VCustomer['Rutruns']);
                        $VCustomer['Nets'] = $this->Format($VCustomer['Nets']);
                        $VCustomer['Paids'] = $this->Format($VCustomer['Paids']);
                        $VCustomer['Inpaids'] = $this->Format($VCustomer['Inpaids']);
                        if (L($VCustomer, 'Sales')) {
                           foreach ($VCustomer['Sales'] as $KSale => $VSale) {
                              $VSale['TTC'] = $this->Format($VSale['TTC']);
                              $VSale['Rutruns'] = $this->Format($VSale['Rutruns']);
                              $VSale['Nets'] = $this->Format($VSale['Nets']);
                              $VSale['Paids'] = $this->Format($VSale['Paids']);
                              $VSale['Inpaids'] = $this->Format($VSale['Inpaids']);
                              $VCustomer['Sales'][$KSale] = $VSale;
                           }
                           $send['LCustomers'][$KCustomer] = $VCustomer;
                        }

                        $send['LCustomers'][$KCustomer] = $VCustomer;
                     }

                     $send['Totals']['TTCs'] = $this->Format($send['Totals']['TTCs']);
                     $send['Totals']['Rutruns'] = $this->Format($send['Totals']['Rutruns']);
                     $send['Totals']['Nets'] = $this->Format($send['Totals']['Nets']);
                     $send['Totals']['Paids'] = $this->Format($send['Totals']['Paids']);
                     $send['Totals']['Inpaids'] = $this->Format($send['Totals']['Inpaids']);
                  }
                  break;
            }
            break;
      }



      $this->SaleView->prints($send);
   }

   public function add($in)
   {
      // --- Lightweight logger (kept) ---
      $DBG = function ($label, $data = null) {
         $s = '[SALE::ADD] ' . $label . ': ';
         if (is_scalar($data) || $data === null) {
            $s .= var_export($data, true);
         } else {
            $s .= json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
         }
         error_log($s);
      };
      $DBG('HIT', date('c'));

      // --- Build $in['POSTS'] from POST (lower top-level, keep rows) ---
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         // Start from raw $_POST
         $src = $_POST;

         // Merge POSTS[...] if present (shadow wins)
         if (isset($_POST['POSTS']) && is_array($_POST['POSTS'])) {
            foreach ($_POST['POSTS'] as $k => $v) {
               $src[$k] = $v;
            }
         }

         // Lowercase top-level keys only
         $posts = [];
         foreach ($src as $k => $v) {
            $lk = is_string($k) ? strtolower($k) : $k;
            $posts[$lk] = $v; // keep inner arrays untouched here
         }

         // Duplicate important keys in PascalCase for legacy code compatibility
         $dupKeys = [
            'Customer',
            'AT',
            'Products',
            'TVA',
            'Tax',
            'Cobon',
            'Gift',
            'Reduction',
            'Expense',
            'HT',
            'TTC',
            'PaidMonetary',
            'PaidOnline',
            'Paid',
            'Rest',
            'Terms',
            'Notes',
            'btn_add'
         ];
         foreach ($dupKeys as $Cap) {
            $low = strtolower($Cap);
            if (array_key_exists($low, $posts) && !array_key_exists($Cap, $posts)) {
               $posts[$Cap] = $posts[$low];
            }
         }

         $in['POSTS'] = $posts;

         // Diagnostics (keep)
         $DBG('TOP_KEYS', array_keys($in['POSTS']));
         $prods = $in['POSTS']['Products'] ?? $in['POSTS']['products'] ?? null;
         $DBG('HAS_PRODUCTS', is_array($prods));
         $DBG('PRODUCTS_COUNT', is_array($prods) ? count($prods) : 0);
         if (is_array($prods) && !empty($prods[0])) {
            $DBG('ROW0_KEYS', array_keys($prods[0]));
            $DBG('ROW0_SAMPLE', $prods[0]);
         }
         $DBG('BTN_ADD_P()', function_exists('P') ? P($in, 'btn_add') : null);
         $DBG('CLICKED()', function_exists('clicked') ? clicked($in, 'btn_add') : null);
      } else {
         $in['POSTS'] = isset($in['POSTS']) && is_array($in['POSTS']) ? $in['POSTS'] : [];
      }

      // --- Your original bootstrapping ---
      $send = [];
      $send['LTranslates'] = $this->SaleLang;

      $SaleCore = new SaleCore();
      $SaleCore->LoadParams($in);
      $send['LPosts'] = $SaleCore->Preper(Core::FDISPLAY);

      $send = array_merge($send, $this->SaleModel->add($send['LPosts']));

      // --- On submit ---
      if (clicked($in, 'btn_add')) {
         $DBG('PHASE', 'clicked==true → LoadForm/Preper(FADD)/Check');

         // 1) Load raw
         $SaleCore->LoadForm($in);

         // 2) Preper for add
         $send['LPosts'] = $SaleCore->Preper(Core::FADD);

         // PATCH 1: restore Products if Preper zeroed them
         $rawProds = $in['POSTS']['Products'] ?? $in['POSTS']['products'] ?? [];
         if (
            (empty($send['LPosts']['Products'])) ||
            (isset($send['LPosts']['Products'][0]['ID']) && (int)$send['LPosts']['Products'][0]['ID'] === 0)
         ) {
            if (is_array($rawProds) && !empty($rawProds)) {
               $send['LPosts']['Products'] = array_values($rawProds);
               $DBG('PATCH_PRODUCTS', ['applied' => true, 'count' => count($send['LPosts']['Products'])]);
            } else {
               $DBG('PATCH_PRODUCTS', ['applied' => false, 'reason' => 'raw empty']);
            }
         } else {
            $DBG('PATCH_PRODUCTS', ['applied' => false, 'reason' => 'preper kept rows']);
         }

         // PATCH 2: normalize line rows (types, HT/Total, Product)
         $tvaRate = (float)($send['LPosts']['TVA'] ?? $in['POSTS']['TVA'] ?? $in['POSTS']['tva'] ?? 0);
         if (!empty($send['LPosts']['Products']) && is_array($send['LPosts']['Products'])) {
            foreach ($send['LPosts']['Products'] as $i => $r) {
               $id  = isset($r['ID']) ? (int)$r['ID'] : (isset($r['Id']) ? (int)$r['Id'] : 0);
               $pr  = isset($r['Price']) ? (float)$r['Price'] : (isset($r['price']) ? (float)$r['price'] : 0.0);
               $qty = isset($r['Quantity']) ? (float)$r['Quantity'] : (isset($r['quantity']) ? (float)$r['quantity'] : 0.0);
               if ($qty <= 0) $qty = 1.0;

               $ht  = round($pr * $qty, 2);
               $tax = round($ht * ($tvaRate / 100), 2);
               $tot = round($ht + $tax, 2);

               $send['LPosts']['Products'][$i]['ID']       = $id;
               $send['LPosts']['Products'][$i]['Product']  = $id;   // required by some validators
               $send['LPosts']['Products'][$i]['Price']    = $pr;
               $send['LPosts']['Products'][$i]['Quantity'] = $qty;
               $send['LPosts']['Products'][$i]['HT']       = $ht;
               $send['LPosts']['Products'][$i]['Total']    = $tot;  // not a DB column (we strip it later)
               if (!isset($send['LPosts']['Products'][$i]['Code'])) {
                  $send['LPosts']['Products'][$i]['Code'] = '';
               }
            }
            $DBG('NORMALIZED_ROW0', $send['LPosts']['Products'][0]);
         }

         // Build a lowercase-deep copy ONLY for Core->Check
         $lowerDeep = function ($v) use (&$lowerDeep) {
            if (!is_array($v)) return $v;
            $out = [];
            foreach ($v as $k => $val) {
               $nk = is_string($k) ? strtolower($k) : $k;
               $out[$nk] = $lowerDeep($val);
            }
            return $out;
         };
         $forCore = $lowerDeep($send['LPosts']);

         // Validate with Core using the small-keys version
         $SaleCore->LoadForm(['POSTS' => $forCore]);
         $send['Errors'] = $SaleCore->Check(Core::FADD);
         $DBG('CHECK_ERRORS', $send['Errors'] ?? null);
         if (!empty($send['LPosts']['Products'][0])) {
            $DBG('LPOSTS_ROW0', $send['LPosts']['Products'][0]);
            $DBG('FORCORE_ROW0', $forCore['products'][0] ?? null);
         }

         // 4) Insert on success
         if (empty($send['Errors'])) {
            // Strip non-DB detail keys
            foreach ($send['LPosts']['Products'] as $i => $r) {
               unset($send['LPosts']['Products'][$i]['Total']);
               unset($send['LPosts']['Products'][$i]['Tax']); // avoid unknown column SLD_Tax
            }

            $DBG('PHASE', 'calling Model->insert');
            $res = $this->SaleModel->insert($send['LPosts']);
            $DBG('INSERT_SUCCESS', $res['Success'] ?? null);
            $DBG('INSERT_ERRORS',  $res['Errors'] ?? null);
            $DBG('INSERT_CELLS_ID', $res['Cells']['ID'] ?? null);

            $send = array_merge($send, $res);

            if (!empty($send['Success']) && isset($send['Cells'])) {
               // Flash message (optional)
               if (session_status() === PHP_SESSION_NONE) {
                  @session_start();
               }
               $_SESSION['flash'] = ['type' => 'success', 'msg' => V($this->SaleLang, 'ASuccess')];

               // No header(); let the view redirect via JS
               $send['RedirectTo'] = WLink('sale/display/' . $send['Cells']['ID']);

               // Clear form state to avoid "sticky" re-submit
               $send['LPosts'] = [];
            } else {
               $DBG('PHASE', 'insert failed');
            }
         } else {
            $DBG('PHASE', 'check failed (validation)');
         }
      } else {
         $DBG('PHASE', 'clicked==false (لن يتم الحفظ)');
      }

      // Render
      $this->SaleView->add($send);
   }


   public function edit($in)
   {
      $send = array();

      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SaleCore();
      $SaleCore->LoadParams($in);
      $send['LPosts'] = $SaleCore->Preper(Core::FDISPLAY);

      if (clicked($in, 'btn_edit')) {
         $SaleCore->LoadForm($in);
         $send['Errors'] = $SaleCore->Check(CORE::FEDIT);
         if (count($send['Errors']) === 0) {
            $send['LPosts'] = $SaleCore->Preper(Core::FEDIT);
            $send = array_merge($send, $this->SaleModel->update($send['LPosts']));
            if (isset($send['Success']) and $send['Success']) {
            }
         }
      }

      $send = array_merge($send, $this->SaleModel->edit($SaleCore->Preper(Core::FDISPLAY)));
      if (L($send, 'Cells')) {
         $Cells = $send['Cells'];

         $this->SaleView->edit($send);
      } else {
         $this->ErrorController->e404($send);
      }
   }

   public function remove($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SalequotationCore();
      if (clicked($in, 'btn_remove')) {
         $SaleCore->LoadForm($in);
         $send['Errors'] = $SaleCore->Check(CORE::FREMOVE);
         if (count($send['Errors']) === 0) {
            $send['LPosts'] = $SaleCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->SaleModel->delete($send['LPosts']));
         }
      }
      $SaleCore->LoadParams($in);
      $send['Errors'] = $SaleCore->Check(CORE::FREMOVE);
      if (count($send['Errors']) === 0) {
         unset($send['Errors']);
         $send['LPosts'] = $SaleCore->Preper(Core::FREMOVE);
         $send = array_merge($send, $this->SaleModel->remove($send['LPosts']));
      }
      if (L($send, 'Cells') or (isset($send['Success']) and $send['Success'])) {
         if (L($send, 'Cells')) {
            $Cells = $send['Cells'];

            $Cells['Notes'] = nl2br($Cells['Notes']);

            $send['Cells'] = $Cells;
         }
         $this->SaleView->remove($send);
      } else {
         $this->ErrorController->e404($send);
      }
   }

   public function dashboard($in)
   {
      $send = array();

      $send['LTranslates'] = $this->SaleLang;
      $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

      $send = array_merge($send, $this->SaleModel->dashboard(null));

      $send['json'] = $this->Tochart(
         $send['Sales']['Charts'],
         V($send['LTranslates'], 'Payments'),
         V($send['LTranslates'], 'Sales')
      );

      $this->LayerController->headerdashboard($in);
      $this->SaleView->dashboard($send);
      $this->LayerController->footerdashboard($in);
   }

   public function setting($in)
   {
      $send = array();
      $send['LTranslates'] = $this->SaleLang;
      $SaleCore = new SalequotationCore();
      $this->SaleView->setting($send);
   }
}
