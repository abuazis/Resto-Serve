<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrderInserted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('ordered');
    }

    public function broadcastWith()
    {
        return [
            'id' => $this->order->id,
            'id_user' => $this->order->id_user,
            'nama_pelanggan' => $this->order->nama_pelanggan,
            'no_meja'=> $this->order->no_meja,
            'alamat' => $this->order->alamat,
            'waktu_order' => $this->order->waktu_order,
            'keterangan' => $this->order->keterangan,
            'status_order' => $this->order->status_order,
            'created_at' => $this->order->created_at,
            'updated_at' => $this->order->update_at,
        ];
    }
}
