@extends('layouts.app')

@section('content')
    <article>
        <h2 class="text-2xl font-semibold mb-4">Base URL</h2>
        <div class="bg-gray-800 p-4 rounded shadow mb-6">
            <x-torchlight-code language='text'>
                http://your-api-base-url.com/api
            </x-torchlight-code>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Endpoints</h2>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">1. List All Plans</h3>
            <p><strong>Endpoint:</strong> <code class="bg-gray-500 p-1 rounded">GET /plans</code></p>
            <p><strong>Description:</strong> Retrieve a list of all plans.</p>
            <p><strong>Response:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    [
                        {
                            "id": 1,
                            "title": "Plan Title 1",
                            "description": "Description of Plan 1",
                            "date": "2023-10-01",
                            "location": "Location 1",
                            "participants": [1, 2, 3]
                        },
                        {
                            "id": 2,
                            "title": "Plan Title 2",
                            "description": "Description of Plan 2",
                            "date": "2023-10-02",
                            "location": "Location 2",
                            "participants": [4, 5]
                        }
                    ]
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">2. Create a New Plan</h3>
            <p><strong>Endpoint:</strong> <code class="bg-gray-500 p-1 rounded">POST /plans</code></p>
            <p><strong>Description:</strong> Create a new plan.</p>
            <p><strong>Request Body:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "title": "New Plan Title",
                        "description": "Description of the new plan",
                        "date": "2023-10-10",
                        "location": "New Location",
                        "participants": [1, 2]
                    }
                </x-torchlight-code>
            </div>
            <p><strong>Response:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "id": 3,
                        "title": "New Plan Title",
                        "description": "Description of the new plan",
                        "date": "2023-10-10",
                        "location": "New Location",
                        "participants": [1, 2]
                    }
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">3. Get a Specific Plan</h3>
            <p><strong>Endpoint:</strong> <code class="bg-gray-500 p-1 rounded">GET /plans/{id}</code></p>
            <p><strong>Description:</strong> Retrieve details of a specific plan by ID.</p>
            <p><strong>Response:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "id": 1,
                        "title": "Plan Title 1",
                        "description": "Description of Plan 1",
                        "date": "2023-10-01",
                        "location": "Location 1",
                        "participants": [1, 2, 3]
                    }
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">4. Update a Plan</h3>
            <p><strong>Endpoint:</strong> <code class="bg-gray-500 p-1 rounded">PUT /plans/{id}</code></p>
            <p><strong>Description:</strong> Update an existing plan by ID.</p>
            <p><strong>Request Body:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "title": "Updated Plan Title",
                        "description": "Updated description of the plan",
                        "date": "2023-10-15",
                        "location": "Updated Location",
                        "participants": [2, 3]
                    }
                </x-torchlight-code>
            </div>
            <p><strong>Response:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "id": 1,
                        "title": "Updated Plan Title",
                        "description": "Updated description of the plan",
                        "date": "2023-10-15",
                        "location": "Updated Location",
                        "participants": [2, 3]
                    }
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">5. Delete a Plan</h3>
            <p><strong>Endpoint:</strong> <code class="bg-gray-500 p-1 rounded">DELETE /plans/{id}</code></p>
            <p><strong>Description:</strong> Delete a specific plan by ID.</p>
            <p><strong>Response:</strong></p>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "message": "Plan deleted successfully."
                    }
                </x-torchlight-code>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Models</h2>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">Plan</h3>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "id": "integer",
                        "title": "string",
                        "description": "string",
                        "date": "date",
                        "location": "string",
                        "participants": "array of integers"
                    }
                </x-torchlight-code>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Requests</h2>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">StorePlanRequest</h3>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "title": "required|string|max:255",
                        "description": "required|string",
                        "date": "required|date",
                        "location": "required|string|max:255",
                        "participants": "array"
                    }
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">UpdatePlanRequest</h3>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "title": "sometimes|required|string|max:255",
                        "description": "sometimes|required|string",
                        "date": "sometimes|required|date",
                        "location": "sometimes|required|string|max:255",
                        "participants": "array"
                    }
                </x-torchlight-code>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Resources</h2>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">PlanResource</h3>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    {
                        "id": "integer",
                        "title": "string",
                        "description": "string",
                        "date": "date",
                        "location": "string",
                        "participants": "array of integers"
                    }
                </x-torchlight-code>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-xl font-semibold mb-2">PlanCollection</h3>
            <div class="bg-gray-800 p-4 rounded shadow">
                <x-torchlight-code language='json'>
                    [
                        {
                            "id": "integer",
                            "title": "string",
                            "description": "string",
                            "date": "date",
                            "location": "string",
                            "participants": "array of integers"
                        }
                    ]
                </x-torchlight-code>
            </div>
        </div>
    </article>
@endsection
