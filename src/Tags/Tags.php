<?php

namespace Coennie\ActiveCampaign\Tags;

use Coennie\ActiveCampaign\Resource;

/**
 * Class Tags
 * @package Mediatoolkit\ActiveCampaign\Tags
 * @see https://developers.activecampaign.com/reference#tags
 */
class Tags extends Resource
{
	/**
	 * Create a tag
	 * @see https://developers.activecampaign.com/reference#create-a-new-tag
	 *
	 * @param array $tag
	 * @return string
	 */
	public function create(array $tag)
	{
		$req = $this->client
			->getClient()
			->post('/api/3/tags', [
				'json' => [
					'tag' => $tag
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * Get tag
	 * @see https://developers.activecampaign.com/reference#retrieve-a-tag
	 *
	 * @param int $id
	 *
	 * @return string
	 */
	public function get(int $id)
	{
		$req = $this->client
			->getClient()
			->get('/api/3/tags/' . $id);

		return $req->getBody()->getContents();
	}

	/**
	 * Update a tag
	 * @see https://developers.activecampaign.com/reference#update-a-tag
	 *
	 * @param int $id
	 * @param array $tag
	 * @return string
	 */
	public function update(int $id, array $tag)
	{
		$req = $this->client
			->getClient()
			->put('/api/3/tags/' . $id, [
				'json' => [
					'tag' => $tag
				]
			]);

		return $req->getBody()->getContents();
	}

	/**
	 * Delete a tag
	 * @see https://developers.activecampaign.com/reference#remove-a-tag
	 *
	 * @param int $id
	 * @return string
	 */
	public function delete(int $id)
	{
		$req = $this->client
			->getClient()
			->delete('/api/3/tags/' . $id);

		return 200 === $req->getStatusCode();
	}

    /**
     * List all tags
     * @see https://developers.activecampaign.com/reference#retrieve-all-tags
     * @param array $query_params
     * @return string
     */
    public function listAll(array $query_params = [])
    {
        $req = $this->client
            ->getClient()
            ->get('/api/3/tags', [
                'query' => $query_params
            ]);
        return $req->getBody()->getContents();
    }

}