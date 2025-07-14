<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Contributor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contributor>
 */
class ContributorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $skills = [
            'PHP, Laravel, MySQL',
            'JavaScript, Node.js, MongoDB',
            'Python, Django, PostgreSQL',
            'Java, Spring Boot, MySQL',
            'C#, .NET, SQL Server',
            'Go, Gin, Redis',
            'Ruby, Rails, PostgreSQL',
            'React, Vue.js, Angular',
            'Flutter, Dart, Firebase',
            'Kotlin, Android, SQLite'
        ];

        $roles = [
            'Backend Developer',
            'Frontend Developer',
            'Full Stack Developer',
            'Mobile Developer',
            'DevOps Engineer',
            'Software Engineer',
            'Database Administrator',
            'API Developer',
            'UI/UX Designer',
            'Quality Assurance'
        ];

        $companies = [
            'Developer di Google Indonesia',
            'Software Engineer di Gojek',
            'Backend Developer di Tokopedia',
            'Full Stack Developer di Shopee',
            'Mobile Developer di Bukalapak',
            'DevOps Engineer di Traveloka',
            'Software Engineer di Grab',
            'Frontend Developer di Blibli',
            'Backend Developer di OVO',
            'Full Stack Developer di DANA',
            'Software Engineer di Ruangguru',
            'Mobile Developer di Halodoc'
        ];

        $achievements = [
            'Membuat aplikasi web yang digunakan 100k+ pengguna',
            'Mengoptimalkan performa database hingga 70%',
            'Mengembangkan REST API dengan response time <100ms',
            'Implementasi microservices architecture',
            'Membangun sistem real-time dengan WebSocket',
            'Meningkatkan keamanan aplikasi dengan OAuth 2.0',
            'Mentoring 5+ junior developer',
            'Mengurangi bug production hingga 90%',
            'Mengintegrasikan payment gateway lokal',
            'Membangun CI/CD pipeline yang efisien',
            'Mengembangkan aplikasi mobile cross-platform',
            'Optimasi SEO website hingga ranking #1 Google'
        ];

        $bioTemplates = [
            'Seorang {role} berpengalaman yang fokus pada pengembangan aplikasi menggunakan teknologi modern. Passionate dalam menciptakan solusi yang efisien dan user-friendly.',
            'Developer yang memiliki keahlian dalam {skill} dan berpengalaman dalam membangun aplikasi skala besar. Suka belajar teknologi baru dan berbagi pengetahuan.',
            'Profesional IT yang sudah malang melintang di industri teknologi Indonesia. Ahli dalam {skill} dan selalu mengikuti perkembangan teknologi terbaru.',
            'Pengembang software yang passionate dalam menciptakan kode yang clean dan maintainable. Memiliki pengalaman dalam berbagai proyek teknologi.',
            'Tech enthusiast yang selalu tertantang untuk menyelesaikan masalah kompleks dengan solusi yang elegant. Fokus pada best practices dan code quality.'
        ];

        $selectedRole = $this->faker->randomElement($roles);
        $selectedSkill = $this->faker->randomElement($skills);
        $bioTemplate = $this->faker->randomElement($bioTemplates);
        $bio = str_replace(['{role}', '{skill}'], [strtolower($selectedRole), $selectedSkill], $bioTemplate);

        return [
            'name' => $this->faker->name(),
            'role' => $selectedRole,
            'skill' => $selectedSkill,
            'bio' => $bio,
            'experience' => $this->faker->randomElement(['1 tahun', '2 tahun', '3 tahun', '4 tahun', '5 tahun', '6+ tahun']),
            'contributions' => json_encode($this->faker->randomElements($companies, $this->faker->numberBetween(1, 4))),
            'achievements' => json_encode($this->faker->randomElements($achievements, $this->faker->numberBetween(1, 3))),
            'social_media' => json_encode([
                'github' => 'github.com/' . $this->faker->userName(),
                'linkedin' => 'linkedin.com/in/' . $this->faker->userName(),
                'gmail' => $this->faker->email(),
                'twitter' => 'twitter.com/' . $this->faker->userName()
            ]),
            'is_active' => $this->faker->boolean(80),
        ];
    }

    public function active(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => true,
        ]);
    }

    public function inactive(): static
    {
        return $this->state(fn(array $attributes) => [
            'is_active' => false,
        ]);
    }

    public function withProfile()
    {
        return $this->afterCreating(function (Contributor $contributor) {
            File::create([
                'type' => 'profile',
                'id_referensi' => $contributor->id,
                'context' => 'contributor',
                'path' => "$contributor->id/template/man-profile.jpg",
            ]);
        });
    }
}
