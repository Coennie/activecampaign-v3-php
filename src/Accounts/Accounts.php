<?php

namespace Coennie\ActiveCampaign\Accounts;

use Coennie\ActiveCampaign\Resource;

/**
 * Class Accounts
 * @package Coennie\ActiveCampaign\Contacts
 * @see https://developers.activecampaign.com/reference#account
 */
class Accounts extends Resource
{
	/**
	 * @param array $account
	 *
	 * @return mixed
	 */
	public function create(array $account)
	{
		$req = $this->client
			->getClient()
			->post('/api/3/accounts', [
				'json' => [
					'account' => $account
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param int $id
	 *
	 * @param array $query_params
	 *
	 * @return mixed
	 */
	public function get(int $id, array $query_params = [])
	{
		$req = $this->client
			->getClient()
			->get('/api/3/accounts/' . $id, [
				'query' => $query_params
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param int $id
	 * @param array $account
	 *
	 * @return mixed
	 */
	public function update(int $id, array $account)
	{
		$req = $this->client
			->getClient()
			->put('/api/3/accounts/' . $id, [
				'json' => [
					'account' => $account
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param int $id
	 *
	 * @return bool
	 */
	public function delete(int $id)
	{
		$req = $this->client
			->getClient()
			->delete('/api/3/accounts/' . $id);

		return 200 === $req->getStatusCode();
	}

	/**
	 * @param array $query_params
	 * @param int $limit
	 * @param int $offset
	 *
	 * @return mixed
	 */
	public function listAll(array $query_params = [], int $limit = 20, int $offset = 0)
	{
		$query_params = array_merge($query_params, [
			'limit' => $limit,
			'offset' => $offset
		]);

		$req = $this->client
			->getClient()
			->get('/api/3/accounts', [
				'query' => $query_params
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param int $accountId
	 * @param string $note
	 *
	 * @return mixed
	 */
	public function createNote(int $accountId, string $note)
	{
		$req = $this->client
			->getClient()
			->post('/api/3/accounts/' . $accountId . '/notes', [
				'json' => [
					'note' => ['note' => $note]
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param int $accountId
	 * @param int $noteId
	 * @param string $note
	 *
	 * @return mixed
	 */
	public function updateNote(int $accountId, int $noteId, string $note)
	{
		$req = $this->client
			->getClient()
			->post('/api/3/accounts/' . $accountId . '/notes/' . $noteId, [
				'json' => [
					'note' => ['note' => $note]
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * @param array $query_params
	 *
	 * @return mixed
	 */
	public function listAllCustomFields(array $query_params = [])
	{
		$req = $this->client
			->getClient()
			->get('/api/3/accountCustomFieldMeta', [
				'query' => $query_params
			]);

		return $req->getBody()->getContents();
	}
}