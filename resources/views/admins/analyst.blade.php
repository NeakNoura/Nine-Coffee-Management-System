@extends('layouts.admin')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- In your layouts/admin.blade.php, inside <head> -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">

<div class="flex">
    <!-- Sidebar / Filter Panel -->
    <div class="w-1/5 bg-yellow-400 p-4 rounded-lg">
        <h2 class="text-white text-lg font-bold mb-4">Filter Panel</h2>
        <label class="block mb-2 text-white">Outlet Location</label>
        <select class="w-full mb-4 p-2 rounded">
            <option>All</option>
            <option>Location 1</option>
        </select>
        <label class="block mb-2 text-white">Outlet Size</label>
        <select class="w-full mb-4 p-2 rounded">
            <option>All</option>
            <option>Medium</option>
        </select>
        <label class="block mb-2 text-white">Item Type</label>
        <select class="w-full mb-4 p-2 rounded">
            <option>All</option>
            <option>Snack</option>
        </select>
    </div>

    <!-- Main Content -->
    <div class="w-4/5 p-6 space-y-6">
        <!-- KPI Cards -->
        <div class="grid grid-cols-4 gap-4">
            <div class="bg-green-500 text-white p-4 rounded-lg shadow">
                <p class="text-sm">Total Sales</p>
                <p class="text-2xl font-bold">${{ number_format($totalEarnings,2) }}</p>
            </div>
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow">
                <p class="text-sm">Avg Sales</p>
                <p class="text-2xl font-bold">${{ number_format($avgSales ?? 0,2) }}</p>
            </div>
            <div class="bg-yellow-500 text-white p-4 rounded-lg shadow">
                <p class="text-sm">No of Items</p>
                <p class="text-2xl font-bold">{{ $totalProducts }}</p>
            </div>
            <div class="bg-purple-500 text-white p-4 rounded-lg shadow">
                <p class="text-sm">Avg Rating</p>
                <p class="text-2xl font-bold">{{ $avgRating ?? 0 }}</p>
            </div>
        </div>

        <!-- Charts -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="font-bold mb-2">Sales by Product Type</h3>
                <canvas id="barChart"></canvas>
            </div>
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="font-bold mb-2">Outlet Size Distribution</h3>
                <canvas id="pieChart"></canvas>
            </div>
        </div>

        <!-- Top Products Table -->
        <div class="bg-white p-4 rounded-lg shadow">
            <h3 class="font-bold mb-2">Top Products</h3>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">Product</th>
                        <th class="p-2">Sales</th>
                        <th class="p-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td class="p-2">{{ $product->name }}</td>
                            <td class="p-2">${{ $product->sales ?? 0 }}</td>
                            <td class="p-2">{{ $product->quantity ?? 0 }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center p-2">No products found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar chart: Sales by Product Type
    const barCtx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: @json($itemTypes ?? []),
            datasets: [{
                label: 'Sales',
                data: @json($itemSales ?? []),
                backgroundColor: 'rgba(59,130,246,0.7)'
            }]
        },
        options: { responsive: true }
    });

    // Pie chart: Outlet Size Distribution
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: @json($outletSizes ?? []),
            datasets: [{
                data: @json($outletSizeCounts ?? []),
                backgroundColor: ['#34D399','#60A5FA','#FBBF24']
            }]
        },
        options: { responsive: true }
    });
</script>
@endsection
