<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        DB::table('jobs')->insert(['title' => '教員募集!!', 'content' => "自身が、料金や指導内容を設定できるため、ご自身が希望する指導が可能です。\n高時給の収入を実現されている先生が多い点が特徴の1つです。", 'attention' => true, 'job_category_id'=> 1, 'price' => 300000, 'image' => 'public/images/150415532410_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'プログラマー募集!!', 'content' => "多数のプロジェクトを抱え、スキルに合わせた配属を行います。\nカウンセラーのフォローもあるので安心した勤務が可能です。", 'attention' => true, 'job_category_id'=> 3, 'price' => 800000, 'image' => 'public/images/ookawa9thPAR56458_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '請負開発経験者募集!!', 'content' => "受託開発をメインとしたWeb/オープン系のシステム開発を行っております。\n大手企業との取引・エンド直案件が多いです。", 'attention' => false, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'public/images/PK4131309PAR58125_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '最新技術が好きな技術者募集!!', 'content' => "平均年齢が25歳前後と若い社員が多く、気軽に相談が行えます。\n業界経験20年以上のベテランエンジニアもいるので、技術的な相談も出来ます。", 'attention' => false, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'public/images/PKU4151352PAR58369_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '大規模プロジェクト経験者募集!!', 'content' => "大手ITサービス提供企業関連のシステムの開発案件に携わっていただきます。\n２０名ほどのチームで開発を進めているプロジェクトにて詳細設計をご担当いただきます。", 'attention' => false, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'public/images/fujiko0328_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'PM経験者募集!!', 'content' => "大手自動車メーカーにて運用保守のお仕事ですです。\n業務状況に応じて発生するユーザーヒアリングや設計といった上流部分にも挑戦できる環境です。", 'attention' => true, 'job_category_id'=> 3, 'price' => 400000, 'image' => 'public/images/macbook1682_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '自社内開発エンジニア募集!!', 'content' => "客先常駐はありません。\n技術的には比較的、新しい技術を率先して使う傾向があります。", 'attention' => true, 'job_category_id'=> 3, 'price' => 800000, 'image' => 'public/images/macbook1995_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'ユーザー系企業似興味のあるエンジニア募集!!', 'content' => "BtoC、BtoB向け医療系の既存サービスの新規機能開発及び、新規サービスの開発を行っていただきます。", 'attention' => true, 'job_category_id'=> 3, 'price' => 400000, 'image' => 'public/images/YOTA93_ippon15134025_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '高単価フリーランス案件!!', 'content' => "フリーランスエンジニア向けお仕事です。\nご興味ある際はお気軽にご応募いただけると幸いです。", 'attention' => true, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'public/images/watchFTHG1313_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'データサイエンティスト募集!!', 'content' => "自社の各サイトにおけるデータ分析・ユーザーヒアリング等を行って頂きます。\nデータサイエンティスの実務経験必須。", 'attention' => false, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'public/images/iphonexrFTHG8914_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'フルスタックエンジニア求む!!', 'content' => "東京を中心に、コンサルティング、飲食、アパレル、エンターテイメント、IT、デザインなど多業種のシステム開発を行っていただきます。", 'attention' => false, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'public/images/MS458A2817_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'プロジェクトマネージャー求む!!', 'content' => "クライアントである大手企業の新規事業立ち上げや、課題抽出等を行っていただきます。\nPMの経験必須。", 'attention' => false, 'job_category_id'=> 3, 'price' => 500000, 'image' => 'public/images/ADIMGL6708_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'フルスタックエンジニア募集!!', 'content' => "CtoCサービスのフルスタックエンジニアとして参加していただきます。\n最新の技術に触れられる環境があります。", 'attention' => true, 'job_category_id'=> 3, 'price' => 600000, 'image' => 'public/images/CAT9V9A9181_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'データサイエンティスト急募!!', 'content' => "住宅をスマート化し人々の暮らしを実現する事業において、データサイエンティストとしアナリティクスを担っていただきます。", 'attention' => true, 'job_category_id'=> 3, 'price' => 700000, 'image' => 'public/images/RMIMGL2653_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '駅員募集!!', 'content' => "駅において改札業務や、ホームの安全監視などを担います。\n地下鉄では数百名もの駅係員が駅業務に当たっています。", 'attention' => false, 'job_category_id'=> 1, 'price' => 700000, 'image' => 'public/images/kankoucyou1541_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '建築士募集!!', 'content' => "法規チェックに関わる経験が必須\n建築設計や建築の整備に関わる経験などが活かせます！", 'attention' => true, 'job_category_id'=> 4, 'price' => 700000, 'image' => 'public/images/PASONA_3_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => '消防士募集!!', 'content' => "やりがいのあるお仕事です。\n研修後と晴れて消防活動に従事することができます。", 'attention' => true, 'job_category_id'=> 1, 'price' => 700000, 'image' => 'public/images/KAI428034_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'コンビニ店員募集!!', 'content' => "9:00～17:00 週2日×1日4時間からＯＫ 「土日だけ」、「平日だけ」等 勤務時間・曜日、ご希望に応じます", 'attention' => false, 'job_category_id'=> 5, 'price' => 1300000, 'image' => 'public/images/YUKItaiwan_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
        DB::table('jobs')->insert(['title' => 'スーパー店員募集!!', 'content' => "会話も楽しい地元密着のあたたかいスーパーで働いていただきます。\n自分らしく長く活躍できます！", 'attention' => true, 'job_category_id'=> 5, 'price' => 2000000, 'image' => 'public/images/hawaiiDSC00241_TP_V.jpg', 'sort_no' => 1, 'updated_at' => $now, 'created_at' => $now]);
    }
}
