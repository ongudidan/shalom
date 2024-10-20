<?php

use yii\db\Migration;

/**
 * Class m241020_190057_create_shalom_tables
 */
class m241020_190057_create_shalom_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        // Create user table
        $this->createTable('{{%user}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'username' => $this->string()->notNull()->unique(),
            'verification_token' => $this->string()->defaultValue(null),
            'auth_key' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create product_category table
        $this->createTable('{{%product_category}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'parent_id' => $this->string()->defaultValue(null),
            'is_active' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create expense_category table
        $this->createTable('{{%expense_category}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'image' => $this->string(),
            'parent_id' => $this->string()->defaultValue(null),
            'is_active' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create expense table
        $this->createTable('{{%expense}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'expense_category_id' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[expense_category_id]]) REFERENCES {{%expense_category}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create product table
        $this->createTable('{{%product}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'price' => $this->string(),
            'type' => $this->string(),
            'code' => $this->string()->notNull(),
            'product_category_id' => $this->string()->notNull()->defaultValue(null),
            'image' => $this->string(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            // 'FOREIGN KEY ([[product_category_id]]) REFERENCES {{%product_category}} ([[id]])' .
            // $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create vehicle table
        $this->createTable('{{%vehicle}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'type' => $this->string()->notNull(),
            'plate_no' => $this->string()->notNull(),
            'make' => $this->string()->notNull(),
            'model' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create customer table
        $this->createTable('{{%customer}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'company_name' => $this->string(),
            'pin_no' => $this->string()->notNull(),
            'email' => $this->string(),
            'phone_no' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create technician table
        $this->createTable('{{%technician}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'phone_no' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create job_card table
        $this->createTable('{{%job_card}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'date_in' => $this->string()->notNull(),
            'date_out' => $this->string(),
            'card_no' => $this->string()->defaultValue(null),
            'customer_id' => $this->string()->defaultValue(null),
            'technician_id' => $this->string(),
            'reg_no' => $this->string()->defaultValue(null),
            'type' => $this->string()->defaultValue(null),
            'model' => $this->string()->defaultValue(null),
            'engine_no' => $this->string()->defaultValue(null),
            'plate_no' => $this->string()->defaultValue(null),
            'make' => $this->string()->defaultValue(null),
            'mileage' => $this->string()->defaultValue(null),
            'manager_name' => $this->string()->defaultValue(null),
            'reported_defect' => $this->string()->defaultValue(null),
            'completed_action' => $this->string()->defaultValue(null),
            'labour' => $this->string()->defaultValue(null),
            'body_comment' => $this->string()->defaultValue(null),
            'status' => $this->string()->defaultValue(null),
            'created_by' => $this->string()->defaultValue(null),
            'updated_by' => $this->string()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
            'FOREIGN KEY ([[customer_id]]) REFERENCES {{%customer}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            // 'FOREIGN KEY ([[technician_id]]) REFERENCES {{%technician}} ([[id]])' .
            // $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create car type table
        $this->createTable('{{%car_type}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create car make table
        $this->createTable('{{%car_make}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create car model table
        $this->createTable('{{%car_model}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create reported defect table
        $this->createTable('{{%defect}}', [
            'id' => $this->primaryKey(),
            'job_card_id' => $this->string()->notNull(),
            'description' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            // Foreign key for job_card_id
            'FOREIGN KEY ([[job_card_id]]) REFERENCES {{%job_card}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create body comment table
        $this->createTable('{{%body_comment}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create supplier table
        $this->createTable('{{%supplier}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'name' => $this->string()->notNull(),
            'company_name' => $this->string(),
            'pin_no' => $this->string()->notNull(),
            'email' => $this->string(),
            'phone_no' => $this->string()->notNull(),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // Create purchase table
        $this->createTable('{{%purchase}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'reference_no' => $this->string()->notNull(),
            'date' => $this->string()->notNull(),
            'supplier_id' => $this->string()->notNull(),
            'shipping_cost' => $this->string()->defaultValue(null),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[supplier_id]]) REFERENCES {{%supplier}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create purchase_product table
        $this->createTable('{{%purchase_product}}', [
            'id' => $this->primaryKey(),
            'purchase_id' => $this->string()->notNull(), // Foreign key to JobCard table (assuming job_card id is a string)
            'product_id' => $this->string()->notNull(), // Foreign key to Product table
            'quantity' => $this->integer()->notNull(),
            'unit_price' => $this->decimal(10, 2)->notNull(),
            'discount' => $this->decimal(10, 2)->defaultValue(0),
            'paid_amount' => $this->decimal(10, 2)->defaultValue(0),
            'grand_total' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            // Foreign key for purchase_id
            'FOREIGN KEY ([[purchase_id]]) REFERENCES {{%purchase}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            // Foreign key for product_id
            'FOREIGN KEY ([[product_id]]) REFERENCES {{%product}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create sales table
        $this->createTable('{{%sale}}', [
            'id' => $this->string()->notNull()->unique(), // Custom string ID
            'reference_no' => $this->string()->notNull(),
            'date' => $this->string()->notNull(),
            'customer_id' => $this->string()->notNull(),
            'shipping_cost' => $this->string()->defaultValue(null),
            'status' => $this->string()->notNull(),
            'created_by' => $this->string()->notNull(),
            'updated_by' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'FOREIGN KEY ([[customer_id]]) REFERENCES {{%customer}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create sale_product table
        $this->createTable('{{%sale_product}}', [
            'id' => $this->primaryKey(),
            'sale_id' => $this->string()->notNull(), // Foreign key to JobCard table (assuming job_card id is a string)
            'product_id' => $this->string()->notNull(), // Foreign key to Product table
            'quantity' => $this->integer()->notNull(),
            'unit_price' => $this->decimal(10, 2)->notNull(),
            'discount' => $this->decimal(10, 2)->defaultValue(0),
            'paid_amount' => $this->decimal(10, 2)->defaultValue(0),
            'grand_total' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            // Foreign key for sale_id
            'FOREIGN KEY ([[sale_id]]) REFERENCES {{%sale}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            // Foreign key for product_id
            'FOREIGN KEY ([[product_id]]) REFERENCES {{%product}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create job_card_product table
        $this->createTable('{{%job_card_product}}', [
            'id' => $this->primaryKey(),
            'job_card_id' => $this->string()->notNull(), // Foreign key to JobCard table (assuming job_card id is a string)
            'product_id' => $this->string()->notNull(), // Foreign key to Product table
            'quantity' => $this->integer()->notNull(),
            'unit_price' => $this->decimal(10, 2)->notNull(),
            'discount' => $this->decimal(10, 2)->defaultValue(0),
            'paid_amount' => $this->decimal(10, 2)->defaultValue(0),
            'grand_total' => $this->decimal(10, 2)->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            // Foreign key for job_card_id
            'FOREIGN KEY ([[job_card_id]]) REFERENCES {{%job_card}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            // Foreign key for product_id
            'FOREIGN KEY ([[product_id]]) REFERENCES {{%product}} ([[id]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        // Create RBAC tables in correct order
        $this->createTable('{{%auth_rule}}', [
            'name' => $this->string()->notNull(),
            'data' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY (name)',
        ]);

        // Create auth_item table
        $this->createTable('{{%auth_item}}', [
            'name' => $this->string()->notNull(),
            'type' => $this->integer()->notNull(),
            'description' => $this->text(),
            'rule_name' => $this->string(),
            'data' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'PRIMARY KEY (name)',
            'KEY rule_name (rule_name)',
            'KEY type (type)',
        ]);

        // Create auth_item_child table
        $this->createTable('{{%auth_item_child}}', [
            'parent' => $this->string()->notNull(),
            'child' => $this->string()->notNull(),
            'PRIMARY KEY (parent, child)',
            'KEY child (child)',
            'FOREIGN KEY ([[parent]]) REFERENCES {{%auth_item}} ([[name]]) ' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
            'FOREIGN KEY ([[child]]) REFERENCES {{%auth_item}} ([[name]]) ' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        $this->createTable('{{%auth_assignment}}', [
            'item_name' => $this->string()->notNull(),
            'user_id' => $this->string()->notNull(),
            'created_at' => $this->integer(),
            'PRIMARY KEY (item_name, user_id)',
            'FOREIGN KEY ([[item_name]]) REFERENCES {{%auth_item}} ([[name]])' .
            $this->buildFkClause('ON DELETE CASCADE', 'ON UPDATE CASCADE'),
        ]);

        $this->createTable('{{%site}}', [
            'id' => $this->primaryKey(),
            'site_name' => $this->string()->defaultValue(null),
            'logo' => $this->string()->defaultValue(null),
            'favicon' => $this->string()->defaultValue(null),

        ]);

        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'address_1' => $this->string()->defaultValue(null),
            'address_2' => $this->string()->defaultValue(null),
            'city' => $this->string()->defaultValue(null),
            'country' => $this->string()->defaultValue(null),
            'province' => $this->string()->defaultValue(null),
            'postal_code' => $this->string()->defaultValue(null),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
        $this->dropTable('{{%site}}');

        $this->dropTable('{{%auth_assignment}}');
        $this->dropTable('{{%auth_item_child}}');
        $this->dropTable('{{%auth_item}}');
        $this->dropTable('{{%auth_rule}}');
        $this->dropTable('{{%job_card_product}}');
        $this->dropTable('{{%sale}}');
        $this->dropTable('{{%purchase}}');
        $this->dropTable('{{%supplier}}');
        $this->dropTable('{{%customer}}');
        $this->dropTable('{{%job_card}}');
        $this->dropTable('{{%vehicle}}');
        $this->dropTable('{{%product}}');
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%user}}');
    }

    protected function buildFkClause($delete = '', $update = '')
    {
        return implode(' ', ['', $delete, $update]);
    }
}
