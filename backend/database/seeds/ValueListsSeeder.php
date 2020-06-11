<?php

use Illuminate\Database\Seeder;

class ValueListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valuelists')->insert(['list' => 'CustomerType', 'value' => 'Customer', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'CustomerType', 'value' => 'Prospect', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'CustomerStatus', 'value' => 'Active', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'CustomerStatus', 'value' => 'Not Active', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'CustomerStatus', 'value' => 'Pending', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'ContactTitle', 'value' => 'Mr.', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'ContactTitle', 'value' => 'Mrs.', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Units', 'value' => 'u', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Units', 'value' => 'kg', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Units', 'value' => 'g', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Units', 'value' => 'h', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Blue', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Cleaning', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Consultancy', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Green', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Indigo', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Online', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Orange', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Pets', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Preconstruction', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Red', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Software', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Violet', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Categories', 'value' => 'Yellow', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Audit', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Bath', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Cereals', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Cleaning', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'CMS', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Community', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Corporate Finance', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Costing', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Data Protection', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Dedicated server', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Design', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Desserts', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Development', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Documentation', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Domain register', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Engineering', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Estimate', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Evaluation', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Executive Support', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Financial', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Garage', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Garden', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Hairdress', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Hosting', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Human Resources', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'International', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Kitchen', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Laundry', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Meeting', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Noodles', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Office', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Online marketing and design', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Operation', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Pasta', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Pies', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Planning', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Pool', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Prevention', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Procurement', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Project Management', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Quality systems', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Renting', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Review', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Room', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Salads', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Sandwiches', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Schedule', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Seafood', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'SEO', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Soups', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Stairs', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Stews', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Technical support', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Testing', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Training', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'VPS', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Subcategories', 'value' => 'Web', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Currencies', 'value' => '€', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Currencies', 'value' => '$', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'Currencies', 'value' => 'SEK', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TaxDiscountType', 'value' => 'General (Discount first)', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TaxDiscountType', 'value' => 'General (Tax first)', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TaxDiscountType', 'value' => 'Lineal (Discount first)', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TaxDiscountType', 'value' => 'Lineal (Tax first)', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'DocumentStatus', 'value' => 'Open', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'DocumentStatus', 'value' => 'Cancelled', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'DocumentStatus', 'value' => 'Closed', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TodoType', 'value' => 'Call', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TodoType', 'value' => 'Meeting', 'created_at' => date("Y-m-d H:i:s")]);
        DB::table('valuelists')->insert(['list' => 'TodoType', 'value' => 'Todo', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
