<?php

namespace App\Http\Controllers;

use App\Mail\SendFactureEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class SendFactureEmailController extends Controller
{
    public function sendEmail(Request $request)
    {

        try {
            $pdfFile = Storage::allFiles('tmp')[0];

            // Check if $pdfFile is null before passing it to the constructor
            if (!$pdfFile) {
                // Log or display an error message
                $content = json_encode([
                    'name' => 'Finance / facture',
                    'statut' => 'error',
                    'message' => 'Une erreur est survenue lors de l\'envoie de la facture !',
                ]);

                session()->flash(
                    'session',
                    $content
                );

                return redirect()->back();
            }
            // Create a new email message with the PDF file attached
            $email = new SendFactureEmail($pdfFile, $request->subject, $request->message);
            // Send the email message with the attachment
            Mail::to($request->email)->send($email);
            // Delete the temporary PDF file from the server
            Storage::delete($pdfFile);

            $content = json_encode([
                'name' => 'Finance / facture',
                'statut' => 'success',
                'message' => 'L\'envoie de la facture a réussi avec succès !',
            ]);

        } catch (\Exception $e) {

            dd($e);

            $content = json_encode([
                'name' => 'Finance / facture',
                'statut' => 'error',
                'message' => 'Une erreur est survenue lors de l\'envoie de la facture !',
            ]);
        }

        session()->flash(
            'session',
            $content
        );
        return redirect()->back();
    }
}
