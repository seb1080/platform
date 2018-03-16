<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Ushahidi Form Role Repository
 *
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi\Application
 * @copyright  2014 Ushahidi
 * @license    https://www.gnu.org/licenses/agpl-3.0.html GNU Affero General Public License Version 3 (AGPL3)
 */

use Ushahidi\Core\Data;
use Ushahidi\Core\Entity;
use Ushahidi\Core\SearchData;
use Ushahidi\Core\Entity\ContactPostStateRepository;

class Ushahidi_Repository_Contact_Post_State extends Ushahidi_Repository implements
	ContactPostStateRepository
{
	// Ushahidi_Repository
	protected function getTable()
	{
		return 'contact_post_state';
	}

	// CreateRepository
	// ReadRepository
	public function getEntity(Array $data = null)
	{
		return new Entity\ContactPostState($data);
	}

	// SearchRepository
	public function getSearchFields()
	{
		return ['post_id', 'contact_id', 'status'];
	}

	// ContactRepository
	public function getByContact($contact, $type)
	{
		return $this->getEntity($this->selectOne(compact('contact', 'type')));
	}

	public function getByPost($post)
	{
		return new Entity\Post($this->selectOne(compact('post')));
	}

//	// FormRoleRepository
//	public function getByPost($post_id)
//	{
//		$query = $this->selectQuery(compact($post_id));
//		$results = $query->execute($this->db);
//
//		return $this->getCollction($results->as_array());
//	}
//
//	// ValuesForFormRoleRepository
//	public function deleteAllForForm($form_id)
//	{
//		return $this->executeDelete(compact('form_id'));
//	}
//
//	// FormRoleRepository
//	public function existsInFormRole($role_id, $form_id)
//	{
//		return (bool) $this->selectCount(compact('role_id', 'form_id'));
//	}e

}
