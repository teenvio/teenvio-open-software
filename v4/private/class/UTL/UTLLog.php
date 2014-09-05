<?php
require_once 'v4/private/class/UTL/UTLUtilidades.php';

/**
 * Clase para el manejo de logs
 * @package UTL
 * @author Victor J Chamorro - victor@ipdea.com
 * @copyright Ipdea Land, S.L. / Teenvio
 *
 * LGPL v3 - GNU LESSER GENERAL PUBLIC LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU LESSER General Public License as published by
 * the Free Software Foundation, either version 3 of the License.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU LESSER General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
class UTLLog{
	
	/**
	 * Constructor privado
	 */
	private function __construct(){}
	
	/**
	 * Guarda una línea de Log
	 * @param string $fichero Nombre del fichero de log, normalmente concuerda con __CLASS__
	 * @param string $nombre Titulo de la línea, va delante del texto, normalmente se usa __CLASS__ o AVISO, ERROR, etc.
	 * @param string $texto Texto a guardar en el log
	 */
	static function guardaLog($fichero, $nombre, $texto){
		$path=UTLUtilidades::getFullPath('v4/private/logs/');
		$file=$path.$fichero."_".date("Ymd").".log";
		$filers=@fopen($file,"a");
		if ($filers!==false){
			$linea=date("H:i:s").": ".$nombre.": ".$texto."\n";
			fputs($filers,$linea);
			@fclose($filers);
		}else{
			//throw new TeException("Error al guardar un log", 1,__CLASS__);
		}
	}
}
?>