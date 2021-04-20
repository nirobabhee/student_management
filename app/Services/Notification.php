<?php
namespace App\Services;

use App\Models\User;
use App\Notifications\Admin\AssignedPickup;
use App\Notifications\Admin\EmployeeAccept;
use App\Notifications\Admin\EmployeeReject;
use App\Notifications\Admin\NewBooking;
use App\Notifications\Admin\NewMerchant;
use App\Notifications\Admin\NewTicket;
use App\Notifications\Admin\NewWithdraw;
use App\Notifications\Admin\TicketReply as AdminTicketReply;
use App\Notifications\Merchant\BookingUpdate;
use App\Notifications\Merchant\Signup;
use App\Notifications\Merchant\TicketReply;
use App\Notifications\Merchant\Verify;
use App\Notifications\Merchant\WithdrawUpdate;

class Notification
{

    public function __construct()
    {
    }
    static function adminNewBooking($id){
        
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new NewBooking($id));
        }
    }
    static function adminNewMerchant($id){
        
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new NewMerchant($id));
        }
    }
    static function merchantSignup($id){
        $user=User::find($id);
        $user->notify(new Signup($id));
    }
    static function merchantVerify($id){
        $user=User::find($id);
        $user->notify(new Verify($id));
    }
    static function merhcantBookingUpdate($id,$bookingId,$text){
        $user=User::find($id);
        $user->notify(new BookingUpdate($bookingId,$text));
    }
    static function employeeBookingAccept($bookingId,$text){
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new EmployeeAccept($bookingId,$text));
        }
      
    }
    static function employeeBookingReject($bookingId,$text){
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new EmployeeReject($bookingId,$text));
        }
    }
    static function merchantWithdraw($id,$withdrawId,$text){
        $user=User::find($id);
        $user->notify(new WithdrawUpdate($withdrawId,$text));
    }
    static function agentPickup($id,$bookingId){
        $user=User::find($id);
        $user->notify(new AssignedPickup($bookingId)); 
    }
    static function merchantticketReply($id,$ticketId,$text){
        $user=User::find($id);
        $user->notify(new TicketReply($ticketId,$text));
    }
    static function newMerchantWithdraw($bookingId){
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new NewWithdraw($bookingId));
        }
      
    }
    static function newMerchantTicket($bookingId){
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new NewTicket($bookingId));
        }
      
    }
    static function newMerchantTicketReply($text){
        $admins=User::whereIn('type',[4,5])->get();
        foreach($admins as $admin){
            $admin->notify(new AdminTicketReply($text));
        }
      
    }

}