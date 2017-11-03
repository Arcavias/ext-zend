<?php

/**
 * @copyright Copyright (c) Metaways Infosystems GmbH, 2013
 * @license LGPLv3, http://www.gnu.org/licenses/lgpl.html
 * @package MW
 * @subpackage Mail
 */


/**
 * Zend implementation for creating e-mails.
 *
 * @package MW
 * @subpackage Mail
 */
class MW_Mail_Message_ZendFixedRecipient
	extends MW_Mail_Message_Zend
	implements MW_Mail_Message_Interface
{
	private $_object;
	private $_embedded = array();
	private $_html;


	/**
	 * Initializes the message instance.
	 *
	 * @param Zend_Mail $object Zend mail object
	 */
	public function __construct( Zend_Mail $object, array $recipients = array() )
	{
		$this->_object = $object;
		parent::__construct( $object );

		foreach( $recipients as $email => $name ) {
			parent::addTo( $email, $name );
		}
	}


	/**
	 * Ignores added recipient email addresses.
	 *
	 * @param string $email Destination address of the target mailbox
	 * @param string|null $name Name of the user owning the target mailbox or null for no name
	 * @return MW_Mail_Message_Interface Message object
	 */
	public function addTo( $email, $name = null )
	{
		return $this;
	}
}
