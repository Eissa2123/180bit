<?php
   class ExpenseController extends Controller{

      private $ExpenseModel;
      private $ExpenseLang;
      private $ExpenseView;

      public function __construct(){
         parent::__construct();
         $this->ExpenseModel = new ExpenseModel();
         $this->ExpenseLang = ExpenseLang::Translate();
         $this->ExpenseView = new ExpenseView();
      }

      public function index($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         $ExpenseCore->LoadForm($in);
         $send['LPosts'] = $ExpenseCore->Preper(Core::FINDEX);
         $send = array_merge($send, $this->ExpenseModel->index($send['LPosts']));
         if(L($send, 'LExpenses')){
            foreach($send['LExpenses'] as $KExpense => $VExpense){
               $VExpense['Amount'] = $this->Format($VExpense['Amount']);
               $send['LExpenses'][$KExpense] = $VExpense;
            }
            $send['Pager'] = $this->Pager($send);
            if($send['Pager'] === null){
               unset($send['Pager']);
            }
         }
		   $send = array_merge($send, $this->Lengths());
         $this->ExpenseView->index($send);
      }

      public function print($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         $ExpenseCore->LoadParams($in);
         $send['LPosts'] = $ExpenseCore->Preper(Core::FDISPLAY);
        
         $send = array_merge($send, $this->ExpenseModel->edit($ExpenseCore->Preper(Core::FDISPLAY)));
         
         if(L($send, 'Cells')){
           $Cells = $send['Cells'];
           
           $send['Cells'] = $Cells;
         }
         $this->ExpenseView->print($send);
      }
        
      public function prints($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         
         $ExpenseCore->LoadForm($in);
         $ExpenseCore->LoadParams($in);
         $send['LPosts'] = $ExpenseCore->Preper(Core::FPRINT);

         $send = array_merge(
            $send, 
            $this->ExpenseModel->print($send['LPosts'])
         );
         
         switch($send['LPosts']['ID']) {
            case 1:
                  $send['Incomes']['TotalExpenseProviders'] = $this->Format($send['Incomes']['TotalExpenseProviders']);
                  $send['Incomes']['TotalExpenseLeaders'] = $this->Format($send['Incomes']['TotalExpenseLeaders']);
                  $send['Incomes']['TotalExpenseOthers'] = $this->Format($send['Incomes']['TotalExpenseOthers']);
                  $send['Incomes']['TotalExpenseEmployees'] = $this->Format($send['Incomes']['TotalExpenseEmployees']);
                  $send['Incomes']['TotalExpenseMarketers'] = $this->Format($send['Incomes']['TotalExpenseMarketers']);
                  $send['Incomes']['TotalExpenseTaxs'] = $this->Format($send['Incomes']['TotalExpenseTaxs']);
                  $send['Incomes']['TotalExpenses'] = $this->Format($send['Incomes']['TotalExpenses']);
               break;
            case 2:
               
               break;
            case 3:
               if(L($send, 'LPurchases')){
                  foreach($send['LPurchases'] as $KSale => $VSale){
                     
                     $VSale['TTC'] = $this->Format($VSale['TTC']);
                     $VSale['Paid'] = $this->Format($VSale['Paid']);

                     $send['LPurchases'][$KSale] = $VSale;
                  }
               }
               $send['Paids'] = $this->Format($send['Paids']);
               break;
            case 4:
               if(L($send, 'LExpenses')){
                  foreach($send['LExpenses'] as $KSale => $VSale){
                     
                     $VSale['Amount'] = $this->Format($VSale['Amount']);

                     $send['LExpenses'][$KSale] = $VSale;
                  }
                  $send['TTCs'] = $this->Format($send['TTCs']);
               }
               break;
         }

         $this->ExpenseView->prints($send);
      }

      public function display($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         $ExpenseCore->LoadParams($in);
         $send['Errors'] = $ExpenseCore->Check(CORE::FDISPLAY);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ExpenseCore->Preper(Core::FDISPLAY);
            $send = array_merge($send, $this->ExpenseModel->display($send['LPosts']));
         }
         
         if(L($send,'Cells')) {
            $Cells = $send['Cells'];
            $send['Cells'] = $Cells;
            $this->ExpenseView->display($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function add($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         if(clicked($in, 'btn_add')){ 
            $ExpenseCore->LoadForm($in);
            $send['Errors'] = $ExpenseCore->Check(CORE::FADD);
            $send['LPosts'] = $ExpenseCore->Preper(Core::FADD);
            if(count($send['Errors']) === 0){
               $send = array_merge($send, $this->ExpenseModel->insert($send['LPosts']));
               if(isset($send['Cells'])){
                  $send['LPosts'] = array();
               }
            }
         }else{
            $send['LPosts'] = array();
         }
         $send = array_merge($send, $this->ExpenseModel->add($in));
         $this->ExpenseView->add($send);
      }

      public function edit($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         $ExpenseCore->LoadParams($in);
         $send['LPosts'] = $ExpenseCore->Preper(Core::FDISPLAY);
         if(clicked($in, 'btn_edit')){ 
            $ExpenseCore->LoadForm($in);
            $send['Errors'] = $ExpenseCore->Check(CORE::FEDIT);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ExpenseCore->Preper(Core::FEDIT);
               $send = array_merge($send, $this->ExpenseModel->update($send['LPosts']));
               if(isset($send['Success']) and $send['Success']){
                  
               }
            }
         }
         $send = array_merge($send, $this->ExpenseModel->edit($ExpenseCore->Preper(Core::FDISPLAY)));

         if(L($send, 'Cells')){
            $Cells = $send['Cells'];

            $send['Cells'] = $Cells;
            $this->ExpenseView->edit($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function remove($in){
         $send = array();
         $send['LTranslates'] = $this->ExpenseLang;
         $ExpenseCore = new ExpenseCore();
         if(clicked($in, 'btn_remove')){ 
            $ExpenseCore->LoadForm($in);
            $send['Errors'] = $ExpenseCore->Check(CORE::FREMOVE);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $ExpenseCore->Preper(Core::FREMOVE);
               $send = array_merge($send, $this->ExpenseModel->delete($send['LPosts']));
            }
         }
         $ExpenseCore->LoadParams($in);
         $send['Errors'] = $ExpenseCore->Check(CORE::FREMOVE);
         if(count($send['Errors']) === 0){
            unset($send['Errors']);
            $send['LPosts'] = $ExpenseCore->Preper(Core::FREMOVE);
            $send = array_merge($send, $this->ExpenseModel->remove($send['LPosts']));
         }
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
               $Cells = $send['Cells'];
               
               $send['Cells'] = $Cells;
            }
            $this->ExpenseView->remove($send);
         }else{
            $this->ErrorController->e404($send);
         }
      }

      public function dashboard($in){
         $send = array();
         
         /*$send['LTranslates'] = $this->CustomerLang;
         $send['LTranslates'] = array_merge($send['LTranslates'], $this->LayerLang);

         $send = array_merge($send, $this->CustomerModel->dashboard(null));
         
         $send['json'] = $this->Tochart(
            $send['Customers']['Charts'], 
            V($send['LTranslates'], 'Payments'),
            V($send['LTranslates'], 'Invoices')
         );

         $this->LayerController->headerdashboard($in);
         $this->CustomerView->dashboard($send);
         $this->LayerController->footerdashboard($in);*/
      }

      public function setting($in){
         $send = array();
         //$send['LTranslates'] = $this->CustomerLang;
         //$CustomerCore = new CustomerCore();
         
         /*if(clicked($in, 'btn_setting')){ 
            $CustomerCore->LoadForm($in);
            $send['Errors'] = $CustomerCore->Check(CORE::FSETTING);
            if(count($send['Errors']) === 0){
               $send['LPosts'] = $CustomerCore->Preper(Core::FSETTING);
               $send = array_merge($send, $this->CustomerModel->saving($send['LPosts']));
            }
         }*/

         /*$send = array_merge($send, $this->CustomerModel->setting(null));
         if(L($send, 'Cells') or (isset($send['Success']) and $send['Success'])){
            if(L($send, 'Cells')){
				   $Cells = $send['Cells'];
               
               // .. 

               $send['Cells'] = $Cells;
            }
            $this->CustomerView->setting($send);
         }else{
            $this->ErrorController->e404($send);
         }*/
         //$this->CustomerView->setting($send);
      }

   }

