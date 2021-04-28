<?php

/**
 * Stripe Setup Intents Confirm Request.
 */

namespace Omnipay\Stripe\Message\SetupIntents;

/**
 * @link https://stripe.com/docs/api/setup_intents/confirm
 */
class ConfirmSetupIntentRequest extends AbstractRequest
{
    /**
     * @inheritdoc
     */
    public function getData()
    {
        $this->validate('setupIntentReference');

        $data = array();

        if ($this->getReturnUrl()) {
            $data['return_url'] = $this->getReturnUrl();
        }

        return $data;
    }

    /**
     * @inheritdoc
     */
    public function getEndpoint()
    {
        return $this->endpoint . '/setup_intents/' . $this->getSetupIntentReference() . '/confirm';
    }

    /**
     * @inheritdoc
     */
    protected function createResponse($data, $headers = [])
    {
        return $this->response = new Response($this, $data, $headers);
    }
}
