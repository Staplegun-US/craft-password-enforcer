<?php
namespace Craft;

class PasswordEnforcerPlugin extends BasePlugin
{

	public function getName()
	{
		return Craft::t('Password Enforcer');
	}

	public function getVersion()
	{
		return '0.1';
	}

	function getDeveloper()
	{
		return 'STAPLEGUN';
	}

	public function getDeveloperUrl()
	{
		return 'http://staplegun.us';
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('passwordenforcer/_settings', array(
			'settings' => $this->getSettings()
		));
	}

	protected function defineSettings()
	{
		return array(
			'enforceLength' => array(AttributeType::Bool, 'label' => 'Enforce Minimum Length Requirement', 'default' => true),
			'minimumPasswordLength' => array(AttributeType::Number, 'label' => 'Minimum Password Length', 'default' => 10, 'required' => true),
			'enforceRegex' => array(AttributeType::Bool, 'label' => 'Enforce Regex Pattern Validation', 'default' => true),
			'passwordValidationRegex' => array(AttributeType::String, 'label' => 'Regular Expression Validation Pattern (Optional)', 'default' => '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/', 'required' => true),
			'passwordValidationRegexErrorText' => array(AttributeType::String, 'label' => 'Regular Expression Validation Error Text', 'default' => 'Your password must contain letters, numbers and symbols.', 'required' => true)
		);
	}

	public function init()
	{
		craft()->on('users.beforeSetPassword', array($this, 'onBeforeSetPassword'));
	}

	public function onBeforeSetPassword(Event $event)
	{
		$settings = craft()->plugins->getPlugin('passwordEnforcer')->getSettings();
		$user = $event->params['user'];
		$password = $event->params['password'];

		$valid = true;

		if ($settings->enforceLength && mb_strlen($password) < $settings->minimumPasswordLength)
		{
			$valid = false;
			$user->addError('newPassword', 'Your password must be at least ' . $settings->minimumPasswordLength . ' characters long.');
		}
		if ($settings->enforceRegex && !preg_match($settings->passwordValidationRegex, $password))
		{
			$valid = false;
			$message = $settings->passwordValidationRegexErrorText ? $settings->passwordValidationRegexErrorText : 'Your password does not meet the requirements. Contact your admin for clarification.';
			$user->addError('newPassword', $message);
		}

		if (!$valid)
		{
			$event->performAction = false;
		}
	}
}
