<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://www.gnu.org/licenses/lgpl.html
 * @package MW
 * @subpackage Mail
 */


/**
 * Zend implementation for creating and sending e-mails.
 *
 * @package MW
 * @subpackage Mail
 */
class MW_Mail_ZendFixedRecipient extends MW_Mail_Zend implements MW_Mail_Interface
{
	private $_object;
	private $_recipients;


	/**
	 * Initializes the instance of the class.
	 *
	 * @param Zend_Mail $object Zend mail object
	 * @param Zend_Mail_Transport_Abstract|null $transport Mail transport object
	 */
	public function __construct( Zend_Mail $object, Zend_Mail_Transport_Abstract $transport = null, array $recipients = array() )
	{
		$this->_object = $object;
		$this->_recipients = $recipients;

		parent::__construct( $object, $transport );
	}


	/**
	 * Creates a new e-mail message object.
	 *
	 * @param string $charset Default charset of the message
	 * @return MW_Mail_Message_Interface E-mail message object
	 */
	public function createMessage( $charset = 'UTF-8' )
	{
		return new MW_Mail_Message_ZendFixedRecipient( clone $this->_object, $this->_recipients );
	}
}
