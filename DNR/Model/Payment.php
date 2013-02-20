<?php
namespace DNR\Model;

class Payment extends \ActiveRecord\Model
    {

    // Associations
        static $belongs_to = array(
            array('order')
        );

    // Validators
        static $validates_presence_of = array(
            array('method', 'amount', 'transaction')
        );

        static $validates_numericality_of = array(
            array('amount', 'greater_than' => 0.00)
        );

        static $validates_inclusion_of = array(
            array('transaction', 'in' => array('Sale', 'sale', 'Refund', 'refund')),
            array('method', 'in' => array('Cash', 'cash', 'Debit', 'debit', 'Credit', 'credit', 'Stripe', 'stripe'))
        );
    }
