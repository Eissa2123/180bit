<?php
   class DashboardLang extends Lang{

        const L = array(
            'Credits' => array(
                'AR' => 'الدين',
                'EN' => 'Credits',
                'FR' => 'Crédits',
            ),
            'Payements' => array(
                'AR' => 'الدفعات',
                'EN' => 'Payements',
                'FR' => 'Paiements',
            ),
            'Payements2' => array(
                'AR' => 'الأقساط',
                'EN' => 'Payements',
                'FR' => 'Paiements',
            ),
            'Totals' => array(
                'AR' => 'المجموع',
                'EN' => 'Totals',
                'FR' => 'Totals',
            ),'SYear' => array(
                'AR' => 'من سنة',
                'EN' => 'Start Year',
                'FR' => 'Année de début',
            ),'EYear' => array(
                'AR' => 'الى سنة',
                'EN' => 'End Year',
                'FR' => 'Année de fin',
            ),'SMonth' => array(
                'AR' => 'من شهر',
                'EN' => 'Start Month',
                'FR' => 'Mois de début',
            ),'EMonth' => array(
                'AR' => 'الى شهر',
                'EN' => 'End Month',
                'FR' => 'Mois de fin',
            ),'Client' => array(
                'AR' => 'العميل',
                'EN' => 'Client',
                'FR' => 'Client',
            )
        );

        public static function Translate(){
            return self::Load(self::L);
        }

   }
