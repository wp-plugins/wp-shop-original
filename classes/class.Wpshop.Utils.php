<?php 

class Wpshop_Utils
{
	/**
	 * @param string $type ����� ��������� ��������� �������� en � ru
	 * @param string ������ � ������� en ��� ru
	 * @return string ���������� ���� � ������ �������, ���� �������� Exeption, ���� �������������� ������ ����������
	 */
	public static function checkDate($type,$dateString)
	{
		$currentFormat = '';
		$tmp = array();
		
		if (preg_match("/^(\d+)\.(\d+)\.(\d+)$/",$dateString,$tmp))
		{
			$currentFormat = 'ru';
		}
		else if (preg_match("/^(\d+)\-(\d+)\-(\d+)$/",$dateString,$tmp))
		{
			$currentFormat = 'en';
		}
		
		
		if ($type == $currentFormat)
		{
			return $dateString;
		}
		if ($currentFormat == '')
		{
			throw new Exception();
		}
		
		$newString = '';
		if ($type=="ru")
		{
			$newString = "{$tmp[3]}.{$tmp[2]}.{$tmp[1]}";	
		}
		
		if ($type == "en")
		{
			$newString = "{$tmp[3]}-{$tmp[2]}-{$tmp[1]}";
		}
		
		if ($newString != '')
		{
			return $newString;
		}
		else
		{
			throw new Exception();
		}	
	}
}
