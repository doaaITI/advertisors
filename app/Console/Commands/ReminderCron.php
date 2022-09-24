<?php

namespace App\Console\Commands;

use App\Mail\SendReminderEmail;
use App\Models\Advertise;
use Illuminate\Console\Command;
use Mail;
class ReminderCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $data=Advertise::whereDate('start_date', '=', \Carbon\Carbon::tomorrow())
              ->select('start_date','advertiser_id')->get();

        foreach($data as $advertise){
            Mail::to($advertise->advertiser->email)->queue(new SendReminderEmail());
            sleep(1);
        }
    }
}
