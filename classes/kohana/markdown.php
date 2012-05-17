<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Markdown wrapper which gives us the option of turning off HTML entities and
 * markup in the input / output.
 * 
 * @package   Gignite
 * @category  Helper
 * @copyright Gignite, 2011
 * @author    Mathew Davies 
 */
class Kohana_Markdown {
	
	/**
	 * @var Markdown_Parser 
	 */
	protected $markdown = NULL;
	
	/**
	 * @var boolean 
	 */
	protected $allow_markup = FALSE;
	
	/**
	 * @var boolean 
	 */
	protected $allow_entities = FALSE;
	
	public function __construct()
	{
		$this->markdown = new Markdown_Parser;
	}
	
	/**
	 * Setter and gett for allowing HTML markup or not.
	 * 
	 * @param  boolean $markup
	 * @return Kohana_Markdown 
	 */
	public function allow_markup($markup = NULL)
	{
		if (NULL === $markup)
		{
			return $this->allow_markup;
		}
		
		$this->allow_markup = (bool) $markup;
		
		return $this;
	}
	
	/**
	 * Setter and getter for allowing HTML entities or not.
	 * 
	 * @param  boolean $entities
	 * @return Kohana_Markdown 
	 */
	public function allow_entities($entities = FALSE)
	{
		if (NULL === $entities)
		{
			return $this->allow_entities;
		}
		
		$this->allow_entities = (bool) $entities;
		
		return $this;
	}
	
	/**
	 * Renders Markdown input.
	 * 
	 * @param  string $markdown
	 * @return string 
	 */
	public function render($markdown = '')
	{
		$this->markdown->no_entities = ! $this->allow_entities;
		$this->markdown->no_markup   = ! $this->allow_markup;
			
		return $this->markdown->transform($markdown);
	}
	
}