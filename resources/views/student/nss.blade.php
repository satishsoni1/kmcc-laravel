@extends('layouts.app')
@section('title', 'NSS — National Service Scheme')
@section('content')

@include('partials._page-header', [
    'title' => 'National Service Scheme (NSS)',
    'subtitle' => 'Not Me, But You — Serving the community through education and action',
    'breadcrumbs' => ['Student Corner' => route('student.index'), 'NSS' => null],
])

<div class="max-w-7xl mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <aside class="lg:col-span-1">
            @include('student._sidebar')
        </aside>

        <main class="lg:col-span-2 space-y-6">

            <div class="bg-white rounded-xl shadow-md p-8">
                <div class="flex items-start gap-5 mb-5">
                    <div class="w-16 h-16 bg-blue-900 rounded-xl flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-hands-helping text-2xl text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-blue-900">National Service Scheme</h2>
                        <p class="text-yellow-600 font-semibold italic mt-1">"Not Me, But You"</p>
                    </div>
                </div>
                <div class="w-12 h-1 bg-yellow-500 mb-5"></div>
                <p class="text-gray-700 leading-relaxed mb-5">
                    The National Service Scheme (NSS) at K.M.C. College, Khopoli is an active programme that instils a sense of social responsibility among students. NSS volunteers work towards community development, environmental conservation, and social awareness, bridging the gap between the college and the surrounding community.
                </p>
                <p class="text-gray-700 leading-relaxed mb-6">
                    The NSS unit organizes regular activities including blood donation camps, tree plantation drives, cleanliness drives, voter awareness campaigns, health camps, and special camps in adopted villages. Students earn NSS certificates upon completion of the required hours of voluntary service.
                </p>

                <h3 class="text-lg font-bold text-blue-900 mb-4">Key NSS Activities</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-7">
                    @foreach([
                        ['fas fa-tint', 'bg-red-50 border-red-200 text-red-800', 'Blood Donation Camp', 'Annual blood donation camps in collaboration with local hospitals and blood banks. Hundreds of units of blood are donated annually by NSS volunteers.'],
                        ['fas fa-tree', 'bg-green-50 border-green-200 text-green-800', 'Tree Plantation', 'Mass tree plantation drives on the college campus and in the surrounding community to promote environmental awareness and green cover.'],
                        ['fas fa-heartbeat', 'bg-pink-50 border-pink-200 text-pink-800', 'Health Awareness Camps', 'Health check-up camps, eye camps, dental camps, and awareness sessions on hygiene, nutrition, and disease prevention organized in nearby villages.'],
                        ['fas fa-broom', 'bg-yellow-50 border-yellow-200 text-yellow-800', 'Cleanliness Drives', 'Swachh Bharat campaigns in college and nearby areas. NSS volunteers actively participate in Shramdaan activities to keep the environment clean.'],
                        ['fas fa-vote-yea', 'bg-blue-50 border-blue-200 text-blue-800', 'Voter Awareness', 'SVEEP campaigns to create awareness about voter registration and the importance of voting among youth and community members.'],
                        ['fas fa-campground', 'bg-orange-50 border-orange-200 text-orange-800', 'Special Camp', 'Annual 7-day special camp held in an adopted village. Volunteers conduct surveys, awareness programmes, and development activities in the village.'],
                        ['fas fa-female', 'bg-purple-50 border-purple-200 text-purple-800', 'Women Empowerment', 'Workshops and campaigns on women\'s rights, self-defence, hygiene, and education targeted at women in rural communities.'],
                        ['fas fa-road', 'bg-teal-50 border-teal-200 text-teal-800', 'Road Safety Awareness', 'Awareness campaigns and rallies on road safety, traffic rules, and the importance of wearing helmets and seatbelts.'],
                    ] as [$icon, $color, $title, $desc])
                    <div class="border {{ $color }} rounded-xl p-4">
                        <h4 class="font-bold flex items-center gap-2 mb-1 text-sm">
                            <i class="{{ $icon }}"></i> {{ $title }}
                        </h4>
                        <p class="text-sm text-gray-600 leading-relaxed">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                <h3 class="text-lg font-bold text-blue-900 mb-4">How to Join NSS</h3>
                <ol class="space-y-3 mb-6">
                    @foreach([
                        'Contact the NSS Programme Officer at the beginning of the academic year.',
                        'Fill the NSS enrollment form and submit it to the college office.',
                        'Attend the NSS orientation programme.',
                        'Complete a minimum of 120 hours of community service over two years.',
                        'Participate in at least one special camp.',
                        'Receive the NSS Certificate on successful completion.',
                    ] as $i => $step)
                    <li class="flex items-start gap-3 text-sm text-gray-700">
                        <span class="w-6 h-6 bg-blue-900 text-white rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0">{{ $i + 1 }}</span>
                        {{ $step }}
                    </li>
                    @endforeach
                </ol>

                <div class="bg-blue-900 text-white rounded-xl p-5">
                    <h4 class="font-bold mb-2 flex items-center gap-2"><i class="fas fa-user-tie text-yellow-400"></i> NSS Programme Officer</h4>
                    <p class="text-blue-200 text-sm">For enrollment and activity schedule, contact the NSS Programme Officer at the college. Details are available at the college office.</p>
                    <p class="text-sm text-blue-200 mt-2"><i class="fas fa-phone text-yellow-400 mr-1"></i> 95116 16009 &nbsp;|&nbsp; <i class="fas fa-envelope text-yellow-400 mr-1"></i> college_kmc@yahoo.co.in</p>
                </div>
            </div>

        </main>
    </div>
</div>
@endsection
