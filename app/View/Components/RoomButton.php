<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RoomButton extends Component
{
    public $type;
    public $checkFinished;
    public $getRooms;
    public $getBookingRoom;
    public $getMeetingRoom;
    public $setTimeIn;
    public $setTimeOut;
    public $macAddr;
    public $checkMeetingFinished;
    public $checkSystemBooking;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $checkFinished, $getRooms, $getBookingRoom, $getMeetingRoom, $setTimeIn, $setTimeOut, $macAddr,  $checkMeetingFinished, $checkSystemBooking)
    {
        $this->type = $type;
        $this->checkFinished = $checkFinished;
        $this->getRooms = $getRooms;
        $this->getBookingRoom = $getBookingRoom;
        $this->getMeetingRoom = $getMeetingRoom;
        $this->setTimeIn = $setTimeIn;
        $this->setTimeOut = $setTimeOut;
        $this->macAddr = $macAddr;
        $this->checkMeetingFinished = $checkMeetingFinished;
        $this->checkSystemBooking = $checkSystemBooking;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.room-button');
    }
}
