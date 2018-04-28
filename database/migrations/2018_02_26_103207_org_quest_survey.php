<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrgQuestSurvey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('org_quest_survey', function (Blueprint $table) {
            $table->increments('id');
            $table->text('respondents_name');
            $table->text('sl');
            $table->text('address');
            $table->text('mahalla_village');
            $table->text('upazila_thana');
            $table->text('zila_district');
            $table->text('landmark');
            $table->text('location_type');
            $table->text('name_of_supervisor');
            $table->text('interviewers_name');
            $table->text('gps_coordinates');
            $table->text('interviewer_visits');
            $table->text('interview_start_time');
            $table->text('interview_end_time');
            $table->text('interviewer_id_number');
            $table->text('respondent_consent');
            $table->text('contact_number');
            $table->text('age');
            $table->text('gender');
            $table->text('married');
            $table->text('read_bangla_letter');
            $table->text('education');
            $table->text('name_of_establishment');
            $table->text('type_of_business');
            $table->text('number_of_day_store_open');
            $table->text('total_household_member');
            $table->text('adult_household_member');
            $table->text('income_source');
            $table->text('common_sell_item');
            $table->text('full_time_worker');
            $table->text('business_duration');
            $table->text('previous_occupation');
            $table->text('major_goals_for_business');
            $table->text('main_barriers_challenges');
            $table->text('support_type');
            $table->text('training_type');
            $table->text('ownership_type');
            $table->text('business_located');
            $table->text('property_ownership');
            $table->text('store_structure_type');
            $table->text('facilities');
            $table->text('trade_license');
            $table->text('number_of_employee');
            $table->text('number_of_support_member');
            $table->text('number_of_contractual_employee');
            $table->text('total_employee');
            $table->text('average_number_customer');
            $table->text('average_sell_per_customer');
            $table->text('percentage_customer');
            $table->text('credit_offer');
            $table->text('monthly_credit_sell_percentage');
            $table->text('income_from_daily_sells');
            $table->text('expendature_from_daily_sells');
            $table->text('agreement_with_statement');
            $table->text('monetary_problem_for_payment');
            $table->text('feel_safe_in_cash_payment');
            $table->text('concern_about_money_safeness');
            $table->text('cash_transactions_difficulty');
            $table->text('feel_lack_of_capital');
            $table->text('need_products_in_stock_for_better_business');
            $table->text('maintaining_accounts_type');
            $table->text('mainatining_accounts_for_goods');
            $table->text('maintaining_household_expenses');
            $table->text('separate_household_business_expenses');
            $table->text('supplies_of_goods_merchandise');
            $table->text('overall_supplies_from_one_point');
            $table->text('payment_terms_by_supply_mode');
            $table->text('payment_terms_company_distributor');
            $table->text('payment_terms_company_manufacturer');
            $table->text('payment_terms_wholesalers');
            $table->text('payment_terms_nearby_haaat');
            $table->text('payment_terms_same_nearby_area');
            $table->text('payment_terms_others');
            $table->text('frequency_replenish_stock_procure_goods_supplies');
            $table->text('q_74')->comment('Credit or installment payment for goods in last year');
            $table->text('q_75')->comment('Last year taken any personal/ business loan');
            $table->text('pending_business_loans');
            $table->text('amounts_pending_loan');
            $table->text('q_78')->comment('Amounts of current pending business loan');
            $table->text('largest_loan_taken_location');
            $table->text('would_take_loan_if_possible');
            $table->text('access_to_loan');
            $table->text('q_82')->comment('Family members have feature (phone with internet connection facility) / basic phone');
            $table->text('q_83')->comment('Family members own a smartphone with a touchscreen');
            $table->text('family_members_do_not_own_phone');
            $table->text('have_personal_Phone');
            $table->text('type_of_phone');
            $table->text('use_of_personal_mobile_phone');
            $table->text('challenges_of_personal_mobile_phone');
            $table->text('usees_of_computer');
            $table->text('internet_connectivity_in_store_computer');
            $table->text('q_91')->comment('Frequentness of receiving stock/services from  suppliers');
            $table->text('frequentness_of_payment_to_suppliers');
            $table->text('payment_terms_to_suppliers');
            $table->text('problem_facing_on_time_payment');
            $table->text('q_95')->comment('Barriers through mobile account payment for suppliers');
            $table->text('access_to_services');
            $table->text('distance_from_the_store');
            $table->text('cost_to_reach_from_the_store');
            $table->text('nearest_bank_branch');
            $table->text('nearest_ATM');
            $table->text('q_101')->comment('Nearest bKash/Rocket or other digital payment agent');
            $table->text('q_102')->comment('Nearest place from where send or receive money (if it is one of the above mentioned, then repeat that  information)');
            $table->text('q_103')->comment('Nearest place where can recharge (buy airtime or top-up) your mobile (if it is one of the above mentioned, then repeat that  information)');
            $table->text('have_bank_account');
            $table->text('last_use_of_account');
            $table->text('bank_name');
            $table->text('bank_account_for_business_activity');
            $table->text('use_your_bank_account');
            $table->text('reaching_time_in_bank');
            $table->text('cost_to_reach_bank');
            $table->text('reasons_of_not_having_bank_account');
            $table->text('headed_mobile_money');
            $table->text('have_any_MFS_account');
            $table->text('q_114')->comment('Likeness  of three things  in mobile money service');
            $table->text('q_115')->comment('Name three things like least about mobile money service');
            $table->text('q_116')->comment('Name of mobile money service(if available)');
            $table->text('personal_or_merchant_account');
            $table->text('q_118')->comment('Name three things you like most about transferring money via your mobile money service');
            $table->text('q_119')->comment('Name three things you like least about transferring money via your mobile money service');
            $table->text('last_time_heared_MFS');
            $table->text('accepted_MFS_from_customers');
            $table->text('from_time_accepted_MFS');
            $table->text('q_123')->comment('Any changes of customers from using digital MFS');
            $table->text('q_124')->comment('Frequentness of using  merchant account (for business purpose)');
            $table->text('user_friendlyness_of_MFS');
            $table->text('reason_for_not_accceptance_MFS');
            $table->text('q_127')->comment('Make payments any mobile payment system to your suppliers');
            $table->text('q_128')->comment('Reason not using MFS for suppliers');
            $table->text('q_129')->comment('Acceptancy of payment through debit/credit card ');
            $table->text('q_130')->comment('Percentage customer who pay using card');
            $table->text('cash')->comment('');
            $table->text('q_132')->comment('Pays using a debit/ credit card ');
            $table->text('q_133')->comment('Pay through mobile payment service');
            $table->text('q_134')->comment('make time to transactions');
            $table->text('cash2')->comment('');
            $table->text('q_136')->comment('Pays using a debit/ credit card 3');
            $table->text('q_137')->comment('Pay through mobile payment service4');
            $table->text('q_138')->comment('Benefits of receiving payments through mobile payment service');
            $table->text('q_139')->comment('Problem facing for receiving mobile payment ');
            $table->text('face_monthly_limit_barrier');
            $table->text('q_141')->comment('Payments not received because of not getting system confirmation on time');
            $table->text('q_142')->comment('Could not receive payments because of cell phone connectivity');
            $table->text('q_143')->comment('Customer could not make the payment because of system problem');
            $table->text('q_144')->comment('Customer could not make the payment because of lack of balance on mobile money account');
            $table->text('customer_made_mistake');
            $table->text('q_146')->comment('Transaction was slow/resulted in long lines');
            $table->text('q_147')->comment('Other (specify)');
            $table->text('q_148')->comment('Increase the percentage of your sales (number of customer) that is paid through mobile payment service');
            $table->text('q_149')->comment('Not interested because increase the percentage');
            $table->text('member_of_an_asscociation');
            $table->text('name_of_association');
            $table->text('q_152')->comment('How many household members are 12-years-old or younger');
            $table->text('q_153')->comment('Do all children ages 6 to 12 currently attend a school/educational institution');
            $table->text('q_154')->comment('In the past year, did any household member ever do work for which he/she was paid on a daily basis');
            $table->text('q_155')->comment('How many rooms does your household occupy (excluding rooms used for business');
            $table->text('q_156')->comment('What is the major construction material of the walls of the main room');
            $table->text('q_157')->comment('Does the household own any televisions');
            $table->text('q_158')->comment('Does the household own any televisions');
            $table->text('q_159')->comment('How many fans does the household own');
            $table->text('q_160')->comment('How many mobile phones does the household own');
            $table->text('q_161')->comment('Does the household own any bicycles, motorcycle/scooters, or motor cars, etc');
            $table->text('q_162')->comment('Does the household own (or rent/sharecrop/mortgage in or out) 51 or more decimals of cultivable agricultural land (excluding uncultivable land and dwelling ? house/homestead land)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('org_quest_survey');
    }
}
