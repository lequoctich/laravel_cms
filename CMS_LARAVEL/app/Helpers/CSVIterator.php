<?php
namespace App\Helpers;

/**
 * <pre>
 * <p>[Summary]</p>
 * Iterate through Csv file to get data
 * </pre>
 * 
 * @author KhoiPD
 */
class CsvIterator implements \Iterator {
	const ROW_SIZE = 4096;
	/**
	 * The pointer to the cvs file.
	 *
	 * @var resource
	 * @access private
	 */
	private $filePointer = null;
	/**
	 * The current element, which will
	 * be returned on each iteration.
	 *
	 * @var array
	 * @access private
	 */
	private $currentElement = null;
	/**
	 * The row counter.
	 *
	 * @var int
	 * @access private
	 */
	private $rowCounter = null;
	/**
	 * The delimiter for the csv file.
	 *
	 * @var string
	 * @access private
	 */
	private $delimiter = null;
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This is the constructor.It try to open the csv file.The method throws an exception
	 * on failure.
	 * </pre>
	 *
	 * @param string $file
	 *        	The csv file.
	 * @param string $delimiter
	 *        	The delimiter.
	 * @throws Exception
	 * @access public
	 * @author KhoiPD
	 */
	public function __construct($file, $delimiter = ',') {
		try {
			$this->filePointer = fopen ( $file, 'r' );
			$this->delimiter = $delimiter;
		} catch ( Exception $e ) {
			throw new Exception ( 'The file "' . $file . '" cannot be read.' );
		}
	}
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This method resets the file pointer.
	 * </pre>
	 *
	 * @author KhoiPD
	 * @access public
	 */
	public function rewind() {
		$this->rowCounter = 0;
		rewind ( $this->filePointer );
	}
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This method returns the current csv row as a 2 dimensional array
	 * </pre>
	 *
	 * @author KhoiPD
	 * @access public
	 * @return array The current csv row as a 2 dimensional array
	 */
	public function current() {
		$this->currentElement = fgetcsv ( $this->filePointer, self::ROW_SIZE, $this->delimiter );
		$this->rowCounter ++;
		return $this->currentElement;
	}
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This method returns the current row number.
	 * </pre>
	 *
	 * @author KhoiPD
	 * @access public
	 * @return int The current row number
	 */
	public function key() {
		return $this->rowCounter;
	}
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This method checks if the end of file is reached.
	 * </pre>
	 *
	 * @author KhoiPD
	 * @access public
	 * @return boolean Returns true on EOF reached, false otherwise.
	 */
	public function next() {
		return ! feof ( $this->filePointer );
	}
	
	/**
	 * <pre>
	 * <p>[Summary]</p>
	 * This method checks if the next row is a valid row.
	 * </pre>
	 *
	 * @author KhoiPD
	 * @access public
	 * @return boolean If the next row is a valid row.
	 */
	public function valid() {
		if (! $this->next ()) {
			fclose ( $this->filePointer );
			return false;
		}
		return true;
	}
}