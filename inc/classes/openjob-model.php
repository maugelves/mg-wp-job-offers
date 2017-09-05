<?php

namespace MGJO\models;

class OpenJob {

	// Variables
	private $ID                 = 0;
	private $title              = 0;
	private $link               = "";
	private $place              = null;
	private $responsabilities   = null;
	private $requirements       = null;
	private $salarymin          = null;
	private $salarymax          = null;


	// GETTERS AND SETTERS
	/**
	 * @return int
	 */
	public function get_ID() {
		return $this->ID;
	}

	/**
	 * @param int $ID
	 */
	public function set_ID( $ID ) {
		$this->ID = $ID;
	}

	/**
	 * @return int
	 */
	public function get_title() {
		return $this->title;
	}

	/**
	 * @param int $title
	 */
	public function set_title( $title ) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function get_link() {
		return $this->link;
	}

	/**
	 * @param string $link
	 */
	public function set_link( $link ) {
		$this->link = $link;
	}

	/**
	 * @return null
	 */
	public function get_place() {
		return $this->place;
	}

	/**
	 * @param null $place
	 */
	public function set_place( $place ) {
		$this->place = $place;
	}

	/**
	 * @return null
	 */
	public function get_responsabilities() {
		return $this->responsabilities;
	}

	/**
	 * @param null $responsabilities
	 */
	public function set_responsabilities( $responsabilities ) {
		$this->responsabilities = $responsabilities;
	}

	/**
	 * @return null
	 */
	public function get_requirements() {
		return $this->requirements;
	}

	/**
	 * @param null $requirements
	 */
	public function set_requirements( $requirements ) {
		$this->requirements = $requirements;
	}

	/**
	 * @return null
	 */
	public function get_salarymin() {
		return $this->salarymin;
	}

	/**
	 * @param null $salarymin
	 */
	public function set_salarymin( $salarymin ) {
		$this->salarymin = $salarymin;
	}

	/**
	 * @return null
	 */
	public function get_salarymax() {
		return $this->salarymax;
	}

	/**
	 * @param null $salarymax
	 */
	public function set_salarymax( $salarymax ) {
		$this->salarymax = $salarymax;
	}

}