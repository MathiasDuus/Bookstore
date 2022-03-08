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
}
