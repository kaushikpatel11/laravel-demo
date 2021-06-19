<?php

namespace App\Services;

use App\Mail\MailBase;
// Facades
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

/**
 * Class MailBase
 *
 * @package App\Services
 */

class MailService
{
    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Send the message by email
     *
     * @param array|null $mailData
     *
     * @example /dev/null Configuration
     *
     *  namespace  XXXXXXX;
     *  use App\Services\MailService;
     *
     *
     *  class XXXXX extends YYYY {
     *
     *      protected MailService $mailService;
     *
     *       public function __construct(MailService $mailService) {
     *              $this->mailService  = $mailService;
     *       }
     *
     *  Later inside any method whe you need to send an email, set the data in
     *  an array with this structure
     *
     *  $mailData = array(
     *      'from' => array(
     *                  'name'    => 'John Doe',
     *                  'address' => 'sender@domain.com'
     *              ),
     *      'to'   => array(
     *                 'recipient1@destinationDomain.com',
     *                 'recipient2@destinationDomain.com',
     *                 'recipient3@destinationDomain.com',
     *              ),
     *      'cc'   => array(
     *                 'recipient4@destinationDomain.com',
     *                 'recipient5@destinationDomain.com',
     *                 'recipient6@destinationDomain.com',
     *              ),
     *      'bcc'   => array(
     *                 'recipient7@destinationDomain.com',
     *                 'recipient8@destinationDomain.com',
     *                 'recipient9@destinationDomain.com',
     *              ),
     *      'subject'  => 'String with the subject text',
     *      'view'     => 'emails.view_name',
     *      'params'   => array(
     *                 'param1' => data1,
     *                 'param2' => data1,
     *                 'param3' => data1,
     *              ),
     *      'attach' => array(
     *                  'file'    => 'path/to/file',
     *                  'mimeType' => 'application/pdf'
     *              ),
     *  ),
     *
     * 'view': Is the HTML file with the body of the email to send. It is located as a blade template in
     * ./resources/views/emails/....blade.php
     *
     * 'params': If you would like to customize the format of your email's data
     *  before it is sent to the template, you may manually pass your data to the view via the params index
     *  Once the data has been passed to the params index, it will automatically be available in your view,
     *  so you may access it like you would access any other data in your Blade templates:
     *      <div>
     *          Price: {{ $param1 }}
     *          VAT:   {{ $param2 }}
     *          Total: {{ $param3 }}
     *      </div>
     *
     *
     * You can use the service as:
     *
     * $this->mailService->send($mailData);
     *
     * @return boolean
     */
    public function send(Array $mailData = null)
    {
        try {
            Mail::to($mailData['to'])
                ->cc($mailData['cc'])
                ->bcc($mailData['bcc'])
                ->queue(new MailBase($mailData));
        } catch (\Exception $exception) {

            Session::flash('danger', $exception->getMessage());
            return false;
        }

        return true;
    }



    
}
