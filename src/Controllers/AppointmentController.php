<?php

namespace App\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;

class AppointmentController
{
    public function createAppointment($data)
    {
        // Validate the incoming data
        // Create a new appointment
        $appointment = new Appointment();
        $appointment->service_id = $data['service_id'];
        $appointment->client_id = $data['client_id'];
        $appointment->date = $data['date'];
        $appointment->time = $data['time'];
        $appointment->status = 'pending';

        // Save the appointment to the database
        if ($appointment->save()) {
            return ['success' => true, 'message' => 'Appointment created successfully.'];
        }

        return ['success' => false, 'message' => 'Failed to create appointment.'];
    }

    public function confirmAppointment($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'confirmed';
            $appointment->save();
            return ['success' => true, 'message' => 'Appointment confirmed.'];
        }

        return ['success' => false, 'message' => 'Appointment not found.'];
    }

    public function cancelAppointment($id)
    {
        // Find the appointment by ID
        $appointment = Appointment::find($id);
        if ($appointment) {
            $appointment->status = 'canceled';
            $appointment->save();
            return ['success' => true, 'message' => 'Appointment canceled.'];
        }

        return ['success' => false, 'message' => 'Appointment not found.'];
    }

    public function getAppointmentsByUser($userId)
    {
        // Retrieve appointments for a specific user
        return Appointment::where('client_id', $userId)->get();
    }
}