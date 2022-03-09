<?php

namespace Tests\Unit;

use Tests\TestCase;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_get_all_customers()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI0IiwianRpIjoiNDIxNmIxYTFkOGUzNTM5NTgzNzkzM2M2ZDM1YmExODM2ZTZkYTNiOTBiOTMxZjBkMjMwYmEzNWEzMWRkZGM1YjdiMDExNGFmYzEzM2Y0ZWEiLCJpYXQiOjE2NDY2Mzg4NzQuNjgzNDQsIm5iZiI6MTY0NjYzODg3NC42ODM0NDQsImV4cCI6MTY1MjM0MTI3NC42NzQ4MzYsInN1YiI6IjMiLCJzY29wZXMiOltdfQ.0tsm0vNE9NV9JYjWvsKjkVa7iE6e6_gZ594qHorfuakEzSrzoXs4eX2WF19v7KzaOz856eFJ5_HkLs2TZ4NeyymMraZwYK2-qSTKE7RVsaacbEc0kK7Gr7Lb8hIXliiqdSphyCbZu35ozUVZ-1UIR2o4UeCMYbtQmPRDL56QWoHw4QflePR0_mrW2_bF5Cb0RBxZYvlOVpQ_e-JnWxH-yKVRKDsEb0Z2tdthLT7JNbnpcEKRoDt9bm9obUH7yh0bGH6k9yjhFqrh-A0y0-BR-f9FmoKE8-PcYXayEALn5S5aO-VFvp1UvE_Dy8flrOGQ8fh7vie_A1Uy-Y1jrtqbGDIzZCUK5GDtRklnRdTDvj6HN6OyPl8D3gHm26c7LOoMofRfXg2L9Ef7iRdYFGhtAvz5AZCxVrxJ2MSHuY8oSXkPFqQYEkx7BXiUOH5T0K-ySRtIs0iOZ06mYMb5n570lNkasebv0tlXs1ZPad4oFNQTByk8ye7sL7WHu5M8-YzS467DSYvauDwd0vLiyOuHXSNFFifp57fUf0BSPGZcQLl5Fo7P9DLvOrEcCYJxF48TGp1rCSTUzFxegDnRPVpzFzw9rxLL5LnnCYyblyQvuq5aE2_aiJrP5hhb8JnZT84QoQlxgqA0Dltgm5o7TlpRg3hgm0aLoutkPtxtatBPP9o',
        ])->get('/api/customer');

        $response->assertStatus(200);
    }

    public function test_customer_token()
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiYjZmOWM0MDdmMzc2ZDk2YTdiMjU4NGNjYmIwYjA0NjhlZTAzNzYyNzRkMmI3MzU1YzQ1YjI1MDNlZjNmY2FhNDQ4MGI0Y2Y2NzdkYzU0M2YiLCJpYXQiOjE2NDY2Mzg4MzguNDY4NTI4LCJuYmYiOjE2NDY2Mzg4MzguNDY4NTMxLCJleHAiOjE2NTIzNDEyMzguMjU2MjU3LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.M1DCbuanPFt44SJ85g8qqyzt4paMFyIrRSRzOI7xXYjX9egTU_DUL044V_QoTLrwv8gUlKuJ9_cMGIyT9CKIpFMaXEG9jWKQO_i5yeT6HOwbst6snJ0Ub-BtezQyjgFP4ZvpvdOgbRO5Iw7qcebiKVrNpFIUZni-_zufWATZzRC0xvukTcaMXfESLypEhNIsPGcU5RkaHYzdSBGLZWytIFzSsgmzF6JqwW-dK6cF2rmtEslfJELQR0F2bTf20C_LcFYEOitP8fisB0yjsEZIXnEB5t0lp-zwvZ9hXS53VQwe-pZOR7SypeLwPvKqOGTxoO24Ost5hD4TdTuPBtMgXJ7FnwCv-9Zjpnwx9teAhmi0rqsER45N6WcUFZDiDAb7Xh7LCW9-OWJ3w7G_gg4zlmDjK8UwtIPm34ZXpIt8KXLM1Sf6gGzai7NNYazXHY45pgZ1XuybudLXoJgae42SR5ngeyCPY-4s1oQQ96d6M3zfGbeuPvu2AMUuCldTbKdE3XBN0cNooK8V96opqh3inLa9HfwjN4ma0n1rmLDzVYsKMJiovoXKFAYMZNAdYZCO1vzifUT_K1WCTHpiC5-KASF4YCeC4eXnwxsLoHdNSsei-Xok0bSGYFu40SuROwcEcQblXmf79gHCS__26mELki9FXEPKm9Dq5J61Zo2yJEI',
        ])->get('/api/customer_token_test');

        $response->assertStatus(200);
    }
}
