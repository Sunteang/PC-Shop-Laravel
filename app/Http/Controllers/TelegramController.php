<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public function sendToTelegram(Request $request)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chat_id = env('CHAT_ID');

        // 📝 Compose the message
        $message = "🛒 <b>New Order</b>\n";
        $message .= "------------------------------\n";
        $message .= "📦 <b>Product:</b> " . $request->name . "\n";
        $message .= "📝 <b>Description:</b> " . $request->description . "\n";
        $message .= "💵 <b>Price:</b> $" . $request->price . "\n";
        $message .= "🖼️ <b>Image:</b> " . $request->image . "\n\n";
        $message .= "👤 <b>Customer:</b> " . $request->customer_name . "\n";
        $message .= "📞 <b>Phone:</b> " . $request->phone_number;

        // 🔗 Send message to Telegram
        $url = "https://api.telegram.org/bot$token/sendMessage";

        $data = [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML',
        ];

        file_get_contents($url . '?' . http_build_query($data));

        return redirect()->back()->with('success', 'Your order successfully sent! We will contact you as soon as posible, Thanks!');
    }
}
