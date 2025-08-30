<?php
class DashboardController extends Controller
{

   private $LayerController;

   private $DashboardModel;
   private $DashboardLang;
   private $LayerLang;
   private $DashboardView;

   public function __construct()
   {
      parent::__construct();
      $this->LayerController = new LayerController();
      $this->DashboardModel = new DashboardModel();
      $this->DashboardLang = DashboardLang::Translate();
      $this->LayerLang = LayerLang::Translate();
      $this->DashboardView = new DashboardView();
   }

   public function index($in)
   {
      $send = array();

      $send['LTranslates'] = $this->DashboardLang;

      $DashboardCore = new DashboardCore();
      $DashboardCore->LoadForm($in);
      $send['LPosts'] = $DashboardCore->Preper(Core::FINDEX);

      $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

      $send = array_merge($send, $this->DashboardModel->index($send['LPosts']));

      /*$send['Cells']['Payements']['Amount'] = $this->Formats($send['Cells']['Payements']['Amount']);
         $send['Cells']['Credits']['Amount'] = $this->Formats($send['Cells']['Credits']['Amount']);
         $send['Cells']['Debts']['Amounts'] = $this->Formats($send['Cells']['Debts']['Amounts']);
         $send['Cells']['Invoices']['Amount'] = $this->Formats($send['Cells']['Invoices']['Amount']);
         $send['Cells']['Credits2']['Amount'] = $this->Formats($send['Cells']['Credits2']['Amount']);
         $send['Cells']['Totals']['Amount'] = $this->Formats($send['Cells']['Totals']['Amount']);
         $send['Cells']['Totals2']['Amount'] = $this->Formats($send['Cells']['Totals2']['Amount']);
         $send['Cells']['Totals3']['Amount'] = $this->Formats($send['Cells']['Totals3']['Amount']);
         $send['Cells']['Net']['Amount'] = $this->Formats($send['Cells']['Net']['Amount']);*/

      $send['json1'] = $this->Tochart2(
         $send['Cells']['Invoices']['Charts'],
         V($send['LTranslates'], 'Invoices')
      );

      $send['json2'] = $this->Tochart2(
         $send['Cells']['Payements']['Charts'],
         V($send['LTranslates'], 'Payements')
      );




      $this->DashboardView->index($send);
   }

   public function setting($in)
   {
      $send = array();
      $this->DashboardView->setting($send);
   }
}
