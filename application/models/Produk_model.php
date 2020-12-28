<?php
use GuzzleHttp\Client;

class Produk_model extends CI_Model {    
  public function getAllProduk(){
    $client = new Client();
    $response = $client->request('GET', 'http://localhost/ci-restserver-tokobima/produk', [
      'query' => [
        'apikey' => 123456
      ]
    ]);
  
    $result = json_decode($response->getBody()->getContents(), true);
    return $result[0]["data"];
  }

  public function deleteProduk($id){
    $client = new Client();
    $response = $client->request('DELETE', 'http://localhost/ci-restserver-tokobima/produk', [
      'form_params' => [
        'apikey' => 123456,
        'id' => $id
      ]
    ]);
  
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function editProduk($id, $nama, $harga, $stok, $img){
    $data = [
      "apikey" => 123456,
      "id" => $id,
      "nama_produk" => $nama,
      "harga_produk" => $harga,
      "stok_produk" => $stok,
      "img_produk" => $img
    ];
    $client = new Client();
    $response = $client->request('PUT', 'http://localhost/ci-restserver-tokobima/produk', [
      'form_params' => $data
    ]);
  
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  }

  public function tambahProduk($nama, $harga, $stok, $img){
    $data = [
      "apikey" => 123456,
      "nama_produk" => $nama,
      "harga_produk" => $harga,
      "stok_produk" => $stok,
      "img_produk" => $img
    ];
    $client = new Client();
    $response = $client->request('POST', 'http://localhost/ci-restserver-tokobima/produk', [
      'form_params' => $data
    ]);
  
    $result = json_decode($response->getBody()->getContents(), true);
    return $result;
  } 
}
?>