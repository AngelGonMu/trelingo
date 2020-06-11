<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(['id' => 1, 'code' => 'OR200001', 'name' => 'Order on 1 for customer 1 by contact 167', 'date' => '2020-01-01', 'due_date' => '2020-01-11', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Tax first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 167, 'customer_id' => 1, 'quote_id' => 1, 'invoice_id' => 1, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 2, 'code' => 'OR200002', 'name' => 'Order on 2 for customer 2 by contact 135', 'date' => '2020-01-02', 'due_date' => '2020-01-12', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 135, 'customer_id' => 2, 'quote_id' => 2, 'invoice_id' => 2, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 3, 'code' => 'OR200003', 'name' => 'Order on 3 for customer 3 by contact 6', 'date' => '2020-01-03', 'due_date' => '2020-01-13', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 6, 'customer_id' => 3, 'quote_id' => 3, 'invoice_id' => 3, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 4, 'code' => 'OR200004', 'name' => 'Order on 4 for customer 4 by contact 59', 'date' => '2020-01-04', 'due_date' => '2020-01-14', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 59, 'customer_id' => 4, 'quote_id' => 4, 'invoice_id' => 4, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 5, 'code' => 'OR200005', 'name' => 'Order on 1 for customer 1 by contact 167', 'date' => '2020-02-01', 'due_date' => '2020-02-11', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '20', 'contact_id' => 167, 'customer_id' => 1, 'quote_id' => 5, 'invoice_id' => 5, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 6, 'code' => 'OR200006', 'name' => 'Order on 2 for customer 2 by contact 135', 'date' => '2020-02-02', 'due_date' => '2020-02-12', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 135, 'customer_id' => 2, 'quote_id' => 6, 'invoice_id' => 6, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 7, 'code' => 'OR200007', 'name' => 'Order on 3 for customer 3 by contact 6', 'date' => '2020-02-03', 'due_date' => '2020-02-13', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 6, 'customer_id' => 3, 'quote_id' => 7, 'invoice_id' => 7, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 8, 'code' => 'OR200008', 'name' => 'Order on 4 for customer 4 by contact 59', 'date' => '2020-02-04', 'due_date' => '2020-02-14', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 59, 'customer_id' => 4, 'quote_id' => 8, 'invoice_id' => 8, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 9, 'code' => 'OR200009', 'name' => 'Order on 1 for customer 1 by contact 173', 'date' => '2020-03-01', 'due_date' => '2020-03-11', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 173, 'customer_id' => 1, 'quote_id' => 9, 'invoice_id' => 9, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 10, 'code' => 'OR200010', 'name' => 'Order on 2 for customer 2 by contact 279', 'date' => '2020-03-02', 'due_date' => '2020-03-12', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '20', 'contact_id' => 279, 'customer_id' => 2, 'quote_id' => 10, 'invoice_id' => 10, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 11, 'code' => 'OR200011', 'name' => 'Order on 3 for customer 3 by contact 81', 'date' => '2020-03-03', 'due_date' => '2020-03-13', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 81, 'customer_id' => 3, 'quote_id' => 11, 'invoice_id' => 11, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 12, 'code' => 'OR200012', 'name' => 'Order on 4 for customer 4 by contact 61', 'date' => '2020-03-04', 'due_date' => '2020-03-14', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 61, 'customer_id' => 4, 'quote_id' => 12, 'invoice_id' => 12, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 13, 'code' => 'OR200013', 'name' => 'Order on 15 for customer 1 by contact 167', 'date' => '2020-03-15', 'due_date' => '2020-03-25', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Tax first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 167, 'customer_id' => 1, 'quote_id' => 13, 'invoice_id' => 13, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 14, 'code' => 'OR200014', 'name' => 'Order on 16 for customer 2 by contact 135', 'date' => '2020-03-16', 'due_date' => '2020-03-26', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 135, 'customer_id' => 2, 'quote_id' => 14, 'invoice_id' => 14, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 15, 'code' => 'OR200015', 'name' => 'Order on 17 for customer 3 by contact 6', 'date' => '2020-03-17', 'due_date' => '2020-03-27', 'status' => 'Open', 'currency' => 'SEK', 'tdtype' => 'Lineal (Tax first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 6, 'customer_id' => 3, 'quote_id' => 15, 'invoice_id' => 15, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 16, 'code' => 'OR200016', 'name' => 'Order on 18 for customer 4 by contact 59', 'date' => '2020-03-18', 'due_date' => '2020-03-28', 'status' => 'Open', 'currency' => 'SEK', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 59, 'customer_id' => 4, 'quote_id' => 16, 'invoice_id' => 16, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 17, 'code' => 'OR200017', 'name' => 'Order on 10 for customer 1 by contact 173', 'date' => '2020-04-10', 'due_date' => '2020-04-20', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 173, 'customer_id' => 1, 'quote_id' => 17, 'invoice_id' => 17, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 18, 'code' => 'OR200018', 'name' => 'Order on 11 for customer 2 by contact 279', 'date' => '2020-04-11', 'due_date' => '2020-04-21', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 279, 'customer_id' => 2, 'quote_id' => 18, 'invoice_id' => 18, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 19, 'code' => 'OR200019', 'name' => 'Order on 12 for customer 3 by contact 81', 'date' => '2020-04-12', 'due_date' => '2020-04-22', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '20', 'contact_id' => 81, 'customer_id' => 3, 'quote_id' => 19, 'invoice_id' => 19, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 20, 'code' => 'OR200020', 'name' => 'Order on 13 for customer 4 by contact 61', 'date' => '2020-04-13', 'due_date' => '2020-04-23', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 61, 'customer_id' => 4, 'quote_id' => 20, 'invoice_id' => 20, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 21, 'code' => 'OR200021', 'name' => 'Order on 17 for customer 1 by contact 173', 'date' => '2020-04-17', 'due_date' => '2020-04-27', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 173, 'customer_id' => 1, 'quote_id' => 21, 'invoice_id' => 21, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 22, 'code' => 'OR200022', 'name' => 'Order on 18 for customer 2 by contact 279', 'date' => '2020-04-18', 'due_date' => '2020-04-28', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 279, 'customer_id' => 2, 'quote_id' => 22, 'invoice_id' => 22, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 23, 'code' => 'OR200023', 'name' => 'Order on 19 for customer 3 by contact 81', 'date' => '2020-04-19', 'due_date' => '2020-04-29', 'status' => 'Open', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 81, 'customer_id' => 3, 'quote_id' => 23, 'invoice_id' => 23, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 24, 'code' => 'OR200024', 'name' => 'Order on 20 for customer 4 by contact 61', 'date' => '2020-04-20', 'due_date' => '2020-04-30', 'status' => 'Open', 'currency' => '$', 'tdtype' => 'Lineal (Discount first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 61, 'customer_id' => 4, 'quote_id' => 24, 'invoice_id' => 24, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 25, 'code' => 'OR200025', 'name' => 'Order on 1 for customer 1 by contact 167', 'date' => '2020-05-01', 'due_date' => '2020-05-11', 'status' => 'Closed', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 167, 'customer_id' => 1, 'quote_id' => 25, 'address_info' => '{"address": "14 Taylor St", "city": "St. Stephens Ward", "province": "Kent", "postal_code": "CT2 7PP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01835-703597", "phone2": "01944-369967", "email": "info@alandrosenburgcpapc.co.uk", "web": "http://www.alandrosenburgcpapc.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 26, 'code' => 'OR200026', 'name' => 'Order on 2 for customer 2 by contact 135', 'date' => '2020-05-02', 'due_date' => '2020-05-12', 'status' => 'Closed', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '20', 'contact_id' => 135, 'customer_id' => 2, 'quote_id' => 26, 'address_info' => '{"address": "5 Binney St", "city": "Abbey Ward", "province": "Buckinghamshire", "postal_code": "HP11 2AX", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01937-864715", "phone2": "01714-737668", "email": "info@capgeminiamerica.co.uk", "web": "http://www.capgeminiamerica.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 27, 'code' => 'OR200027', 'name' => 'Order on 3 for customer 3 by contact 6', 'date' => '2020-05-03', 'due_date' => '2020-05-13', 'status' => 'Closed', 'currency' => 'SEK', 'tdtype' => 'Lineal (Tax first)', 'tax' => '0', 'discount' => '0', 'contact_id' => 6, 'customer_id' => 3, 'address_info' => '{"address": "8 Moor Place", "city": "East Southbourne and Tuckton W", "province": "Bournemouth", "postal_code": "BH6 3BE", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01347-368222", "phone2": "01935-821636", "email": "info@elliottjohnwesq.co.uk", "web": "http://www.elliottjohnwesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 28, 'code' => 'OR200028', 'name' => 'Order on 4 for customer 4 by contact 59', 'date' => '2020-05-04', 'due_date' => '2020-05-14', 'status' => 'Closed', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '20', 'contact_id' => 59, 'customer_id' => 4, 'address_info' => '{"address": "505 Exeter Rd", "city": "Hawerby cum Beesby", "province": "Lincolnshire", "postal_code": "DN36 5RP", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01912-771311", "phone2": "01302-601380", "email": "info@mcmahanbenl.co.uk", "web": "http://www.mcmahanbenl.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 29, 'code' => 'OR200029', 'name' => 'Order on 5 for customer 5 by contact 106', 'date' => '2020-05-05', 'due_date' => '2020-05-15', 'status' => 'Closed', 'currency' => '€', 'tdtype' => 'General (Tax first)', 'tax' => '21', 'discount' => '15', 'contact_id' => 106, 'customer_id' => 5, 'quote_id' => 29, 'address_info' => '{"address": "5396 Forth Street", "city": "Greets Green and Lyng Ward", "province": "West Midlands", "postal_code": "B70 9DT", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01547-429341", "phone2": "01290-367248", "email": "info@champagneroom.co.uk", "web": "http://www.champagneroom.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
            DB::table('orders')->insert(['id' => 30, 'code' => 'OR200030', 'name' => 'Order on 6 for customer 6 by contact 2', 'date' => '2020-05-06', 'due_date' => '2020-05-16', 'status' => 'Closed', 'currency' => '€', 'tdtype' => 'General (Discount first)', 'tax' => '21', 'discount' => '10', 'contact_id' => 2, 'customer_id' => 6, 'address_info' => '{"address": "9472 Lind St", "city": "Desborough", "province": "Northamptonshire", "postal_code": "NN14 2GH", "country": "United Kingdom"}', 'contact_info' => '{"phone1": "01969-886290", "phone2": "01545-817375", "email": "info@thompsonmichaelcesq.co.uk", "web": "http://www.thompsonmichaelcesq.co.uk"}', 'created_at' => date("Y-m-d H:i:s")]);
    }
}
